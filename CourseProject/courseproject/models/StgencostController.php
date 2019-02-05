<?php

namespace app\models;

use Yii;
use app\models\Stgencost;
use app\models\StgencostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StgencostController implements the CRUD actions for Stgencost model.
 */
class StgencostController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Stgencost models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StgencostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Stgencost model.
     * @param integer $workingpress_idworkingpress
     * @param integer $modellist_idmodellist
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($workingpress_idworkingpress, $modellist_idmodellist)
    {
        return $this->render('view', [
            'model' => $this->findModel($workingpress_idworkingpress, $modellist_idmodellist),
        ]);
    }

    /**
     * Creates a new Stgencost model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Stgencost();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'workingpress_idworkingpress' => $model->workingpress_idworkingpress, 'modellist_idmodellist' => $model->modellist_idmodellist]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Stgencost model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $workingpress_idworkingpress
     * @param integer $modellist_idmodellist
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($workingpress_idworkingpress, $modellist_idmodellist)
    {
        $model = $this->findModel($workingpress_idworkingpress, $modellist_idmodellist);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'workingpress_idworkingpress' => $model->workingpress_idworkingpress, 'modellist_idmodellist' => $model->modellist_idmodellist]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Stgencost model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $workingpress_idworkingpress
     * @param integer $modellist_idmodellist
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($workingpress_idworkingpress, $modellist_idmodellist)
    {
        $this->findModel($workingpress_idworkingpress, $modellist_idmodellist)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Stgencost model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $workingpress_idworkingpress
     * @param integer $modellist_idmodellist
     * @return Stgencost the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($workingpress_idworkingpress, $modellist_idmodellist)
    {
        if (($model = Stgencost::findOne(['workingpress_idworkingpress' => $workingpress_idworkingpress, 'modellist_idmodellist' => $modellist_idmodellist])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
