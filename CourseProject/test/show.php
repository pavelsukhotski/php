<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;

$this->title = 'Test';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <h2>Введенные данные из сессии</h2>
    <p>
        idmodellist <?= $idmodellist ?>
    </p>
    <p>
        idworkingpress <?= $idworkingpress ?>
    </p>
</div>
