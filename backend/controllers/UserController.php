<?php
/**
 * 文件用途：用户管理控制器
 * 
 * 主要功能：
 * - actionIndex() - 用户列表（支持搜索和分页）
 * - actionView() - 查看用户详情
 * - actionCreate() - 创建新用户
 * - actionUpdate() - 更新用户信息
 * - actionDelete() - 软删除用户（防止删除当前登录用户）
 * 
 * @author 贾双双2313936
 */
namespace backend\controllers;

use Yii;
use backend\models\UserAdmin;
use common\models\User;
use common\models\UserSearch;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new UserAdmin();
        $model->scenario = 'create';
        if ($model->status === null) {
            $model->status = User::STATUS_ACTIVE;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', '用户创建成功。');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'default';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', '用户更新成功。');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        // do not show existing password in form
        $model->password = null;

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Soft delete: set status to DELETED (0).
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->isGuest && (int)$id === (int)Yii::$app->user->id) {
            Yii::$app->session->setFlash('error', '不能删除当前登录用户。');
            return $this->redirect(['index']);
        }

        $model = $this->findModel($id);
        $model->status = User::STATUS_DELETED;
        $model->password_reset_token = null;
        $model->verification_token = null;
        $model->save(false, ['status', 'password_reset_token', 'verification_token']);

        Yii::$app->session->setFlash('success', '用户已删除（软删除）。');
        return $this->redirect(['index']);
    }

    protected function findModel($id): UserAdmin
    {
        if (($model = UserAdmin::findOne((int)$id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}


