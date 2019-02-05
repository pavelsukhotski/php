<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Stgencost */

$this->title = 'Update Stgencost: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Stgencosts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->workingpress_idworkingpress, 'url' => ['view', 'workingpress_idworkingpress' => $model->workingpress_idworkingpress, 'modellist_idmodellist' => $model->modellist_idmodellist]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stgencost-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
