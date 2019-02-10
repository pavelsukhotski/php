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
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'capacity')->textInput()->hint('150 - 20000 kg/h')->label('Capacity, kg/h'); ?>

    <?= $form->field($model, 'pressure')->textInput()->hint('5 - 60 bar(g)')->label('Pressure, bar(g)'); ?>
    
    <?= $form->field($model, 'optionsinblockname[]')->checkboxList(\app\models\Optionsinblock::find()->select(['optionsinblockname', 'idoptionsinblock'])->indexBy('optionsinblockname')->column()) ?>

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