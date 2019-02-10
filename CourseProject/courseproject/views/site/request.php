<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Modellist;
use app\models\Workingpress;
use app\models\Optionblock;
use app\models\Optionsinblock;
?>
<div>
            <h2>
                Clayton steam generators
            </h2>
    <br>
    <h3>Required parameters:</h3>
    <br>
</div>
<?php $form = ActiveForm::begin(['id' => 'requestform']); ?>

    
    <?= $form->field($model, 'idmodellist')->listBox(Modellist::find()->select(["CONCAT(`modelname`, ' (', `modelcapacity`, ' kg/h)') AS str", 'idmodellist'])->indexBy('idmodellist')->column()) ?>

    <?= $form->field($model, 'idworkingpress')->listBox(Workingpress::find()->select(['workingpress', 'idworkingpress'])->indexBy('idworkingpress')->column()) ?>

    
    <?= $form->field($model, 'idoptionsinblock')->checkboxList(\app\models\Optionsinblock::find()->select(['optionsinblockname', 'idoptionsinblock'])->indexBy('idoptionsinblock')->column()) ?>

    <div class="form-group">
        <?= Html::submitButton('Ready', ['class' => 'btn btn-primary']) ?>
    </div>

<!-- начало ошибок -->

<div>
    <?php
    /*
    $optionblock = Yii::$app->db->createCommand('SELECT idoptionblock, optionblockname FROM optionblock ORDER BY idoptionblock')
            ->queryAll();
    
    
    $optionslist = Yii::$app->db->createCommand('SELECT optionsinblockname FROM optionsinblock WHERE optionsinblock.idoptionblock = 1')
             ->queryColumn();
     var_dump($optionblock);
     var_dump($optionslist);
     
     
    
    /*
    foreach ($optionblock as $value1) {
        echo $value1;

        $optionslist = Yii::$app->db->createCommand('SELECT optionsinblockname FROM optionsinblock WHERE `optionsinblock.idoptionblock` = $value1')
             ->queryColumn();
         
        foreach ($optionslist as $value2) {
            
        echo $value2;
            
        }
       
        }*/
    
    
    ?>
</div>

<?php ActiveForm::end(); ?>