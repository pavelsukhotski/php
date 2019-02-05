<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Stgencost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stgencost-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'workingpress_idworkingpress')->textInput() ?>

    <?= $form->field($model, 'modellist_idmodellist')->textInput() ?>

    <?= $form->field($model, 'stgencost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
