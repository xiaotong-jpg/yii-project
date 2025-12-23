<?php
/**
 * Team: NoDDL,NKU
 * Coding by Qu Wenmeng 2312358
 * Controller handling movie CRUD and dashboard views.
 */
namespace backend\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use backend\models\MovieForm;
use backend\models\AntiWarMovies;

class MovieController extends Controller
{
    public function actionIndex()
    {
        // Year filter
        $year = Yii::$app->request->get('year');

        // build base query using ActiveRecord
        $query = AntiWarMovies::find()->select(['id', 'title', 'cover_image', 'director', 'actors', 'description', 'release_date'])->orderBy(['id' => SORT_DESC]);
        if (!empty($year)) {
            $query->andWhere(['like', 'release_date', $year . '%', false]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 20],
            'sort' => ['attributes' => ['title', 'release_date', 'director']],
        ]);

        // counts per year for chart and filter list (use Query for aggregation)
        $yearCounts = (new \yii\db\Query())
            ->select(["LEFT(release_date,4) AS y", 'COUNT(*) AS cnt'])
            ->from(AntiWarMovies::tableName())
            ->groupBy('y')
            ->orderBy('y ASC')
            ->all();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'yearCounts' => $yearCounts,
            'selectedYear' => $year,
        ]);
    }

    public function actionDashboard()
    {
        $total = (int) AntiWarMovies::find()->count();
        $withCover = (int) AntiWarMovies::find()->andWhere(['not', ['cover_image' => null]])->andWhere(['<>', 'cover_image', ''])->count();

        $recent = AntiWarMovies::find()->select(['id', 'title', 'cover_image', 'director', 'release_date'])->orderBy(['id' => SORT_DESC])->limit(6)->asArray()->all();

        // yearCounts for dashboard chart
        $yearCounts = (new \yii\db\Query())
            ->select(["LEFT(release_date,4) AS y", 'COUNT(*) AS cnt'])
            ->from(AntiWarMovies::tableName())
            ->groupBy('y')
            ->orderBy('y ASC')
            ->all();

        return $this->render('dashboard', [
            'total' => $total,
            'withCover' => $withCover,
            'recent' => $recent,
            'yearCounts' => $yearCounts,
        ]);
    }

    // Create
    public function actionCreate()
    {
        $model = new MovieForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $record = new AntiWarMovies();
            $record->title = $model->title;
            $record->cover_image = $model->cover_image;
            $record->director = $model->director;
            $record->actors = $model->actors;
            $record->description = $model->description;
            $record->release_date = $model->release_date;
            $record->save(false);

            return $this->redirect(['index']);
        }

        return $this->render('create', ['model' => $model]);
    }

    // Update
    public function actionUpdate($id)
    {
        $record = AntiWarMovies::findOne($id);
        if (!$record) {
            throw new \yii\web\NotFoundHttpException('Movie not found');
        }

        $model = new MovieForm();
        $model->setAttributes($record->getAttributes(), false);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $record->title = $model->title;
            $record->cover_image = $model->cover_image;
            $record->director = $model->director;
            $record->actors = $model->actors;
            $record->description = $model->description;
            $record->release_date = $model->release_date;
            $record->save(false);

            return $this->redirect(['index']);
        }

        return $this->render('update', ['model' => $model, 'id' => $id]);
    }

    // Delete
    public function actionDelete($id)
    {
        $record = AntiWarMovies::findOne($id);
        if ($record) {
            $record->delete();
        }
        return $this->redirect(['index']);
    }
}
