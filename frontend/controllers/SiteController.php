<?php
/**
 * 文件用途：前端站点控制器
 * 
 * 主要功能：
 * - actionIndex() - 首页数据准备（轮播图、历史大事、纪念馆、英雄人物等）
 * - actionSignup() - 用户注册处理（邮箱验证码验证）
 * - actionLogin() - 用户登录处理（支持邮箱或用户名登录）
 * - actionSendSignupCode() - 发送注册邮箱验证码
 * - actionTribute() - 敬礼计数器处理（献花、敬酒、点烛）
 * - actionSubmitMessage() - 留言提交处理
 * 
 * @author 贾双双2313936
 */
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Volunteers;
use common\models\Museums;
use common\models\EmailVerifyCode;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Article;
use common\models\HeroPerson; // 引入刚才的模型
use common\models\WarMapLocation;
use common\models\HistoryTimeline;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'send-signup-code' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
{
    // 1. 获取所有英雄数据
        $heroes = HeroPerson::find()->all();

        // 2. 获取所有地标数据 (新增代码)
        $locations = WarMapLocation::find()->all();
        // 固定取 220,222,223 三条
        $hotArticles = Article::find()
            ->where(['id' => [220, 222, 223]])
            // 如需只显示已发布的可以再加状态条件：
            // ->andWhere(['status' => 1])
            // 按 id 指定顺序排序（MySQL）
            ->orderBy(new \yii\db\Expression("FIELD(id, 220, 222, 223)"))
            ->all();

        // 轮播+标题联动的 6 条
        $featureIds = [244, 258, 256, 230, 232, 251];
        $featuredArticles = Article::find()
            ->where(['id' => $featureIds])
            ->orderBy(new \yii\db\Expression("FIELD(id, 244, 258, 256, 230, 232, 251)"))
            ->all();

        // 志愿者/团队列表（全部展示，供左右滚动）
        $volunteers = Volunteers::find()
            ->orderBy(['publish_date' => SORT_DESC, 'id' => SORT_DESC])
            ->limit(7)
            ->all();

        // 纪念馆列表（首页案例区使用，仅展示 5 个）
        $museums = Museums::find()
            ->orderBy(['id' => SORT_ASC])
            ->limit(5)
            ->all();

        // 抗战大事记（history_timeline 表，全量展示）
        $timelineEvents = HistoryTimeline::find()
            ->orderBy(['event_year' => SORT_ASC, 'event_month_day' => SORT_ASC, 'id' => SORT_ASC])
            ->all();

        // 纪念留言（message_board表）
        $messageBoard = Yii::$app->db->createCommand(
            'SELECT id, username, content FROM message_board ORDER BY id DESC LIMIT 40'
        )->queryAll();

        // 电影海报（用于首页电影展示）
        $movieRows = Yii::$app->db->createCommand(
            'SELECT id, title, cover_image, description FROM anti_war_movies ORDER BY id DESC LIMIT 12'
        )->queryAll();

        if (defined('YII_ENV') && YII_ENV === 'dev') {
            Yii::info('MOVIES_RAW: ' . var_export($movieRows, true), __METHOD__);
        }

        $movies = array_map(function($r){
            return (object)[
                'id' => $r['id'],
                'title' => $r['title'],
                'poster' => $r['cover_image'],
                'summary' => $r['description'],
                'url' => null,
            ];
        }, $movieRows);

        // 获取敬礼（tribute_record）各类型的统计计数，供首页展示使用
        $tributeRows = Yii::$app->db->createCommand(
            'SELECT type, COUNT(*) AS count FROM tribute_record GROUP BY type'
        )->queryAll();
        $tributeCounts = [1 => 0, 2 => 0, 3 => 0];
        foreach ($tributeRows as $r) {
            $t = (int) ($r['type'] ?? 0);
            if (in_array($t, [1,2,3], true)) {
                $tributeCounts[$t] = (int) $r['count'];
            }
        }

        // 计算当前 IP 是否已经对每个 type 敬礼（用于页面刷新时高亮，IP-only 实现）
        $userTributes = [1 => false, 2 => false, 3 => false];
        try {
            $ipAddress = Yii::$app->request->userIP;
            $rows = Yii::$app->db->createCommand('SELECT type FROM tribute_record WHERE ip_address = :ip')
                ->bindValues([':ip' => $ipAddress])->queryAll();
            foreach ($rows as $r) {
                $t = (int) ($r['type'] ?? 0);
                if (in_array($t, [1,2,3], true)) {
                    $userTributes[$t] = true;
                }
            }
        } catch (\Exception $e) {
            Yii::error('Error fetching user tributes: ' . $e->getMessage(), __METHOD__);
        }

    return $this->render('index', [
        'hotArticles' => $hotArticles,
            'featuredArticles' => $featuredArticles,
            'volunteers' => $volunteers,
            'museums' => $museums,
            'timelineEvents' => $timelineEvents,
            'heroes' => $heroes,        // 视图里用 $heroes 访问英雄
            'locations' => $locations,  // 视图里用 $locations 访问地标
            'movies' => $movies,
            'messageBoard' => $messageBoard,  // 纪念留言数据
            'tributeCounts' => $tributeCounts,
            'userTributes' => $userTributes,
    ]);
}

    /**
     * 处理纪念留言提交
     */
    public function actionSubmitMessage()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        if (\Yii::$app->request->isPost) {
        $name = \Yii::$app->request->post('name', '');
        $message = \Yii::$app->request->post('comment', '');
        
        // 简单验证
        if (empty($name) || empty($message)) {
            return [
                'status' => 'error',
                'message' => '姓名和留言内容不能为空'
            ];
        }
        
        // 字符长度限制
        if (mb_strlen($name) > 50) {
            return [
                'status' => 'error',
                'message' => '姓名长度不能超过50个字符'
            ];
        }
        
        if (mb_strlen($message) > 500) {
            return [
                'status' => 'error',
                'message' => '留言内容不能超过500个字符'
            ];
        }
        
        try {
                // 记录日志以便排查多次请求问题
                \Yii::info('SubmitMessage attempt: name=' . $name . ' len=' . mb_strlen($message), __METHOD__);

                // 防止重复快速提交：若在最近 10 秒内已有相同用户名和内容的记录，则视为重复请求，直接返回成功（不重复插入）
                $duplicateCount = (int) \Yii::$app->db->createCommand(
                    'SELECT COUNT(*) FROM message_board WHERE username = :name AND content = :content AND created_at >= (NOW() - INTERVAL 10 SECOND)'
                )->bindValues([':name' => $name, ':content' => $message])->queryScalar();

                if ($duplicateCount > 0) {
                    \Yii::info('Duplicate submission detected, skipping insert', __METHOD__);
                    return [
                        'status' => 'success',
                        'message' => '留言提交成功，感谢您的分享！'
                    ];
                }

            // 计算下一个 id（max + 1），在没有自增或需要显式指定 id 的场景下使用
            $maxId = (int) \Yii::$app->db->createCommand('SELECT MAX(id) FROM message_board')->queryScalar();
            $nextId = $maxId ? $maxId + 1 : 1;

            // 插入数据库，显式设置 id 为 nextId
                \Yii::$app->db->createCommand()
                ->insert('message_board', [
                    'id' => $nextId,
                    'username' => $name,
                    'content' => $message,
                    // 数据库中使用 Unix 时间戳（整型），与现有列类型保持一致
                    'created_at' => time(),
                    'is_approved' => 0, // 默认未审核
                ])
                ->execute();

            return [
                'status' => 'success',
                'message' => '留言提交成功，感谢您的分享！'
            ];
            
        } catch (\Exception $e) {
            \Yii::error('Message submission error: ' . $e->getMessage(), __METHOD__);
            return [
                'status' => 'error',
                'message' => '提交失败，请稍后重试'
            ];
        }
        }
    }

    /**
     * 处理献花、敬酒、点烛等敬礼操作
     */
    public function actionTribute()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        if (\Yii::$app->request->isPost) {
            $type = \Yii::$app->request->post('type', '');
            
            // 验证敬礼类型 (1=献花, 2=敬酒, 3=点烛)
            if (!in_array($type, [1, 2, 3])) {
                return [
                    'status' => 'error',
                    'message' => '无效的敬礼类型'
                ];
            }
            
            try {
                // 获取用户 IP 地址（IP-only 检查）
                $ipAddress = \Yii::$app->request->userIP;
                $existingId = (int) \Yii::$app->db->createCommand(
                    'SELECT id FROM tribute_record WHERE type = :type AND ip_address = :ip ORDER BY id DESC LIMIT 1'
                )->bindValues([':type' => $type, ':ip' => $ipAddress])->queryScalar();

                if ($existingId) {
                    // 已存在：删除该记录（撤回）
                    \Yii::$app->db->createCommand()
                        ->delete('tribute_record', ['id' => $existingId])
                        ->execute();

                    $totalCount = (int) \Yii::$app->db->createCommand(
                        'SELECT COUNT(*) FROM tribute_record WHERE type = :type'
                    )->bindValues([':type' => $type])->queryScalar();

                    return [
                        'status' => 'success',
                        'action' => 'deleted',
                        'id' => $existingId,
                        'count' => $totalCount,
                    ];
                }

                // 未存在：插入敬礼记录（created_at 使用 Unix 时间戳），若已登录同时写入 user_id
                $insertData = [
                    'type' => $type,
                    'ip_address' => $ipAddress,
                    'created_at' => (int)time(),
                ];
                \Yii::$app->db->createCommand()->insert('tribute_record', $insertData)->execute();

                // 获取刚插入记录的 id（auto-increment）
                $lastId = (int) \Yii::$app->db->getLastInsertID();

                // 获取该类型的敬礼总数
                $totalCount = (int) \Yii::$app->db->createCommand(
                    'SELECT COUNT(*) FROM tribute_record WHERE type = :type'
                )->bindValues([':type' => $type])->queryScalar();

                return [
                    'status' => 'success',
                    'action' => 'added',
                    'id' => $lastId,
                    'count' => $totalCount,
                ];
            } catch (\Exception $e) {
                \Yii::error('Tribute submission error: ' . $e->getMessage(), __METHOD__);
                return [
                    'status' => 'error',
                    'message' => '敬礼失败，请稍后重试'
                ];
            }
        }
    }
    
    /**
     * 获取敬礼统计数据
     */
    public function actionGetTributeStats()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        try {
            $stats = \Yii::$app->db->createCommand(
                'SELECT type, COUNT(*) as count FROM tribute_record GROUP BY type'
            )->queryAll();
            
            return [
                'status' => 'success',
                'stats' => $stats
            ];
        } catch (\Exception $e) {
            \Yii::error('Error fetching tribute stats: ' . $e->getMessage(), __METHOD__);
            return [
                'status' => 'error',
                'message' => '获取数据失败'
            ];
        }
    }
    
    public function actionArticle($id)
    {
        $model = Article::findOne($id);
        if ($model === null) {
            throw new \yii\web\NotFoundHttpException('文章不存在');
        }

        return $this->render('article', [
            'model' => $model,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', '感谢您的留言，我们会尽快回复。');
            } else {
                Yii::$app->session->setFlash('error', '发送失败，请稍后再试。');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', '注册成功，欢迎加入！');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Send email OTP code for signup.
     * POST: email=xxx
     */
    public function actionSendSignupCode()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $email = trim((string)Yii::$app->request->post('email', ''));
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['status' => 'error', 'message' => '请输入有效的邮箱地址。'];
        }

        // If email already registered, refuse.
        if (\common\models\User::find()->where(['email' => $email])->exists()) {
            return ['status' => 'error', 'message' => '该邮箱已被注册，请直接登录或更换邮箱。'];
        }

        $issue = EmailVerifyCode::issue($email, Yii::$app->request->userIP, 600);
        if (!$issue['ok']) {
            return ['status' => 'error', 'message' => $issue['message'] ?? '发送失败，请稍后重试。'];
        }

        $code = $issue['code'];
        $expireMinutes = 10;

        try {
            $sent = Yii::$app->mailer
                ->compose(['html' => 'signupOtp-html', 'text' => 'signupOtp-text'], [
                    'code' => $code,
                    'expireMinutes' => $expireMinutes,
                ])
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setTo($email)
                ->setSubject('注册验证码（' . Yii::$app->name . '）')
                ->send();

            if (!$sent) {
                return ['status' => 'error', 'message' => '邮件发送失败，请检查邮箱配置。'];
            }
        } catch (\Throwable $e) {
            Yii::error('Send OTP mail failed: ' . $e->getMessage(), __METHOD__);
            return ['status' => 'error', 'message' => '邮件发送异常，请稍后重试。'];
        }

        return ['status' => 'success', 'message' => '验证码已发送，请注意查收（10分钟内有效）。'];
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', '邮件已发送，请前往邮箱查看后续操作指引。');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', '抱歉，无法为该邮箱重置密码，请确认邮箱是否正确。');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', '邮箱验证成功！');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', '验证失败：链接无效或已过期。');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', '邮件已发送，请前往邮箱查看。');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', '抱歉，无法为该邮箱发送验证邮件，请确认邮箱是否正确。');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    // New template pages
    public function actionHome02()
    {
        return $this->render('home02');
    }

    public function actionLandingPage()
    {
        return $this->render('landing-page');
    }

    public function actionTeam()
    {
        return $this->render('team');
    }

    public function actionSingleTeam()
    {
        return $this->render('single-team');
    }

    public function actionPricing()
    {
        return $this->render('pricing');
    }

    public function actionFaqPage()
    {
        return $this->render('faq-page');
    }

    public function actionGoogleMap()
    {
        return $this->render('google-map');
    }

    public function actionTestimonial()
    {
        return $this->render('testimonial');
    }

    public function actionWhyChooseUs()
    {
        return $this->render('why-choose-us');
    }

    public function actionFamilyLaw()
    {
        return $this->render('family-law');
    }

    public function actionRealEstateLaw()
    {
        return $this->render('real-estate-law');
    }

    public function actionHealthLaw()
    {
        return $this->render('health-law');
    }

    public function actionCriminalLaw()
    {
        return $this->render('criminal-law');
    }

    public function actionBankingLaw()
    {
        return $this->render('banking-law');
    }

    public function actionTaxLaw()
    {
        return $this->render('tax-law');
    }

    public function actionSingleService()
    {
        return $this->render('single-service');
    }

    public function actionProject()
    {
        return $this->render('project');
    }

    public function actionTwoColumn()
    {
        return $this->render('two-column');
    }

    public function actionThreeColumn()
    {
        return $this->render('three-column');
    }

    public function actionFourColumn()
    {
        return $this->render('four-column');
    }

    public function actionTwoColumnGutter()
    {
        return $this->render('two-column-gutter');
    }

    public function actionThreeColumnGutter()
    {
        return $this->render('three-column-gutter');
    }

    public function actionFourColumnGutter()
    {
        return $this->render('four-column-gutter');
    }

    public function actionSingleProject()
    {
        return $this->render('single-project');
    }

    public function actionBlog()
    {
        return $this->render('blog');
    }

    public function actionBlogLeftSidebar()
    {
        return $this->render('blog-left-sidebar');
    }

    public function actionBlogRightSidebar()
    {
        return $this->render('blog-right-sidebar');
    }

    public function actionSingleBlog()
    {
        return $this->render('single-blog');
    }
}