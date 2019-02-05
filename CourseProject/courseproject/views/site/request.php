<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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

    <div class="form-group">
        <?= Html::submitButton('Ready', ['class' => 'btn btn-primary']) ?>
    </div>

<!-- начало ошибок -->

<div>
    <?php
    
    $optionblock = Yii::$app->db->createCommand('SELECT idoptionblock, optionblockname FROM optionblock')
            ->queryAll();
    var_dump($optionblock);
    foreach ($optionblock as $value1) {
        
        $i=1;
        $optionslist = Yii::$app->db->createCommand('SELECT optionsinblockname FROM optionsinblock WHERE optionsinblock.idoptionblock = <?=$i?>')
             ->queryColumn();
        var_dump($optionslist);
     /*   foreach ($optionslist as $value2) {
     /*       echo $form->field($model, 'optionslist[]')->checkboxList(['a' => 'Item A', 'b' => 'Item B', 'c' => 'Item C']);
        }
        echo $value2;
        echo '<br>';
        }*/
    }
    
    ?>
</div>

<?php ActiveForm::end(); ?>