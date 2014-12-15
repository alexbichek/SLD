<?php

namespace app\controllers;

use Yii;
use app\models\Attribute;
use app\models\AttributeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AttributeController implements the CRUD actions for Attribute model.
 */
class AttributeController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Attribute models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AttributeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Attribute model.
     * @param integer $productId
     * @param integer $AttrCatId
     * @return mixed
     */
    public function actionView($productId, $AttrCatId)
    {
        return $this->render('view', [
            'model' => $this->findModel($productId, $AttrCatId),
        ]);
    }

    /**
     * Creates a new Attribute model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Attribute();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'productId' => $model->productId, 'AttrCatId' => $model->AttrCatId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Attribute model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $productId
     * @param integer $AttrCatId
     * @return mixed
     */
    public function actionUpdate($productId, $AttrCatId)
    {
        $model = $this->findModel($productId, $AttrCatId);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'productId' => $model->productId, 'AttrCatId' => $model->AttrCatId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Attribute model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $productId
     * @param integer $AttrCatId
     * @return mixed
     */
    public function actionDelete($productId, $AttrCatId)
    {
        $this->findModel($productId, $AttrCatId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Attribute model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $productId
     * @param integer $AttrCatId
     * @return Attribute the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($productId, $AttrCatId)
    {
        if (($model = Attribute::findOne(['productId' => $productId, 'AttrCatId' => $AttrCatId])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
