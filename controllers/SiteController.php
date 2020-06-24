<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use app\models\Files;
use app\models\FilesForm;

class SiteController extends Controller
{
    public function actions()
    {
      return [
        'error' => [
          'class' => 'yii\web\ErrorAction',
        ]
      ];
    }

    public function actionUpload()
    {
      $model = new FilesForm;
      if (Yii::$app->request->isPost) {
        $model->files = UploadedFile::getInstances($model, 'files');
        if( $model->saveModel() )
          return Yii::$app->response->redirect(Url::to(['site/index']));
      }
      return $this->render('upload', [
        'model' => $model
      ]);
    }
    public function actionIndex()
    {
      $dataProvider = new ActiveDataProvider([
          'query' => Files::find(),
          'pagination' => [
              'pageSize' => 20,
          ],
      ]);
      return $this->render('index', [
        'dataProvider' => $dataProvider
      ]);
    }
}
