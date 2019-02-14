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
use app\models\Optionsinblock;

$this->title = 'Clayton Steam Generators';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <h3>
        Please, select steam generator model by nominal steam capacity, working steam pressure and necessary options
    </h3>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'test-form']); ?>

            <?= $form->field($model, 'idmodellist')->listBox(Modellist::find()->select(['CONCAT(modellist.modelname, " : nominal steam capacity ", modellist.modelcapacity, " kg/h") AS model', 'idmodellist'])->indexBy('idmodellist')->column()) ?>

            <?= $form->field($model, 'idworkingpress')->listBox(Workingpress::find()->select(['CONCAT (workingpress.workingpress, " bar") AS pressure', 'idworkingpress'])->indexBy('idworkingpress')->column()) ?>

            <?= $form->field($model, 'idoptionsinblock')->checkboxList(Optionsinblock::find()->select(['optionsinblockname', 'idoptionsinblock'])->indexBy('idoptionsinblock')->orderBy('optionsinblock.idoptionblock', 'optionsinblock.idoptionsinblock')->column()) ?>

            <div class="form-group">
                <img src="../views/test/captcha.php" /><br/>
                <form action="../views/test/index.php" method="post">
  <input type="text" name="captcha"/>
  
</form>

                <?= Html::submitButton('Confirm', ['class' => 'btn btn-primary', 'name' => 'test-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div> 