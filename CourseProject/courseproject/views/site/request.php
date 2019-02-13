<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Modellist;
use app\models\Workingpress;
use app\models\Optionblock;
use app\models\Optionsinblock;
?>
<div class="site-contact">
            <h2>
                Clayton steam generators
            </h2>
    <br>
    <h3>Required parameters:</h3>
    <br>
</div>

<div class="row">
        <div class="col-lg-5">
<?php $form = ActiveForm::begin(['id' => 'requestform']); ?>

    
    <?= $form->field($model, 'idmodellist')->listBox(Modellist::find()->select(["CONCAT(`modelname`, ' (', `modelcapacity`, ' kg/h)') AS str", 'idmodellist'])->indexBy('idmodellist')->column()) ?>

    <?= $form->field($model, 'idworkingpress')->listBox(Workingpress::find()->select(['workingpress', 'idworkingpress'])->indexBy('idworkingpress')->column()) ?>

    
    <?= $form->field($model, 'idoptionsinblock')->checkboxList(Optionsinblock::find()->select(['optionsinblockname', 'idoptionsinblock'])->indexBy('idoptionsinblock')->column()) ?>

    <div class="form-group">
        <?= Html::submitButton('Ready', ['class' => 'btn btn-primary']) ?>
    </div>

            
<!-- начало ошибок -->



<?php ActiveForm::end(); ?>

</div>
    </div>