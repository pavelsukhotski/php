<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use yii\captcha\Captcha;
use app\models\Modellist;
use app\models\Workingpress;

$this->title = 'Test';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'test-form']); ?>

                <?= $form->field($model, 'idmodellist')->listBox(Modellist::find()->select(['modelname', 'idmodellist'])->indexBy('idmodellist')->column()) ?>

                <?= $form->field($model, 'idworkingpress')->listBox(Workingpress::find()->select(['workingpress', 'idworkingpress'])->indexBy('idworkingpress')->column()) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'test-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
