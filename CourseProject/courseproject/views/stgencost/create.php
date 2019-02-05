<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Stgencost */

$this->title = 'Create Stgencost';
$this->params['breadcrumbs'][] = ['label' => 'Stgencosts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stgencost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
