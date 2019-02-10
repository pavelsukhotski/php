<?php
use yii\helpers\Html;
use app\models\RequestForm;
use app\models\Modellist;
use app\models\Workingpress;
use app\models\Optionblock;
use app\models\Optionsinblock;

?>
<p>Вы ввели следующую информацию:</p>

<ul>
    <li><label>Capacity</label>: <?= Html::encode($model->capacity) ?></li>
    <li><label>Pressure</label>: <?= Html::encode($model->pressure) ?></li>
</ul>
<p>
   <?php 
   if (isset($_POST['capacity'])) {
            //$usermodelname = SELECT idmodellist, modelname, MIN(modelcapacity) FROM modellist WHERE `modelcapacity` >= $_POST['capacity'];
            $usermodelname = (new \yii\db\Query())
                            ->select(['idmodellist', 'modelname', 'MIN(modelcapacity)'])
                            ->from('modellist')
                            ->where('>=', 'modelcapacity', '$_POST[`capacity`]')
                            ->limit(1);
                    foreach ($usermodelname as $k)
        echo 'Model: '.$k;
        var_dump($usermodelname);
   }
   ?>
</p>

<p>
        idoptionsinblock <?php
        /*$idblock = $_POST['capacity'];
        foreach ($idblock as $value) echo $value;*/
     var_dump($_POST);
    /* foreach ($_POST as $key => $arr) {
         foreach ($arr as $inner_key => $val) {
             echo $val;
         }
     }*/
     function optlist($smth) {
         //$optblockname = 'optionsblockname';
         foreach ($smth as $arr) {
         foreach ($arr['optionsinblockname'] as $val) {
             echo $val;
     }
      /*   for ($i = 0; $i <= count ($smth['optionsinblockname']); $i++) {
         echo $smth['optionsinblockname'][$i]."<br>";
     }*/
         
         }
     }
     //optlist($_POST);
     
        ?>
    </p>