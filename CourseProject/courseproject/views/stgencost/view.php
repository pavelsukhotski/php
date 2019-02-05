<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Stgencost */

$this->title = $model->workingpress_idworkingpress;
$this->params['breadcrumbs'][] = ['label' => 'Stgencosts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stgencost-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'workingpress_idworkingpress' => $model->workingpress_idworkingpress, 'modellist_idmodellist' => $model->modellist_idmodellist], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'workingpress_idworkingpress' => $model->workingpress_idworkingpress, 'modellist_idmodellist' => $model->modellist_idmodellist], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'workingpress_idworkingpress',
            'modellist_idmodellist',
            'stgencost',
        ],
    ]) ?>

</div>
