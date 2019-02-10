<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use Yii;
use app\models\Test;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Description of TestController
 *
 * @author ys
 */
class TestController extends Controller {
    
    public function actionIndex()
    {
        $model = new Test();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //Запись введенных данных в сессию с ключом test
            Yii::$app->session->set('test', ['idmodellist' => $model->idmodellist, 'idworkingpress' => $model->idworkingpress]);

            return $this->redirect(['test/show']);//редирект для обработки введенных данных
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
    
    public function actionShow()
    {
        //Нужно сделать модель для выборки данных по данным в сессии
        //здесь просто вызывается view для вывода данных сессии
        $session = Yii::$app->session->get('test');
        return $this->render('show', 
                $session
        );        
    }
    
}
