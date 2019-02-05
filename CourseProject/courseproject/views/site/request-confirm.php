<?php
use yii\helpers\Html;
?>
<p>Вы ввели следующую информацию:</p>

<ul>
    <li><label>Capacity</label>: <?= Html::encode($model->capacity) ?></li>
    <li><label>Pressure</label>: <?= Html::encode($model->pressure) ?></li>
</ul>