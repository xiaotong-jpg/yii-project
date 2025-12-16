<?php
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
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

use common\models\HeroPerson; // 引入刚才的模型
use common\models\WarMapLocation;
use common\models\Article;
use common\models\Volunteers;
use common\models\Museums;
/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        // 1. 获取所有英雄数据
        $heroes = HeroPerson::find()->all();

        // 2. 获取所有地标数据 (新增代码)
        $locations = WarMapLocation::find()->all();

        // 3. 将两个变量同时传给视图 'index'
        return $this->render('index', [
            'heroes' => $heroes,        // 视图里用 $heroes 访问英雄
            'locations' => $locations,  // 视图里用 $locations 访问地标
        ]);
    }

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
    
    return $this->render('index', [
        'hotArticles' => $hotArticles,
            'featuredArticles' => $featuredArticles,
            'volunteers' => $volunteers,
             'museums' => $museums,
    ]);
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
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
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
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
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
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
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
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
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
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
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
