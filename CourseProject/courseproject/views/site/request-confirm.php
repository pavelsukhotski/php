<?php
use yii\helpers\Html;
use app\models\RequestForm;

?>
<p>Вы ввели следующую информацию:</p>

<ul>
    <li><label>Capacity</label>: <?= Html::encode($model->capacity) ?></li>
    <li><label>Pressure</label>: <?= Html::encode($model->pressure) ?></li>
</ul>
<p>
   <?php 
   $models = new RequestForm;
   
   var_dump($models->usermodel());
   ?>
</p>