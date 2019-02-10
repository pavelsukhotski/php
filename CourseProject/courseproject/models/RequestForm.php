<?php
namespace app\models;

use yii\base\Model;

class RequestForm extends \yii\base\Model
{
    public $capacity;
    public $pressure;
    public $usermodelname;
    public $idworkingpress;
    public $idmodellist;
    public $idoptionblock;
    public $idoptionsinblock;
    public $optionsinblockname;
    public $val;

    public function rules()
    {
        return [
       /*     [['capacity', 'pressure'], 'required'],
            ['capacity', 'compare', 'compareValue' => 150, 'operator' => '>=', 'type' => 'number'],
            ['capacity', 'compare', 'compareValue' => 20000, 'operator' => '<=', 'type' => 'number'],
            ['pressure', 'compare', 'compareValue' => 5, 'operator' => '>=', 'type' => 'number'],
            ['pressure', 'compare', 'compareValue' => 60, 'operator' => '<=', 'type' => 'number'],*/
            [['idmodellist', 'idworkingpress'], 'required'],

        ];
    }
    /*
    public function usermodel() {
        if (isset($_POST['capacity'])) {
            //$usermodelname = SELECT idmodellist, modelname, MIN(modelcapacity) FROM modellist WHERE `modelcapacity` >= $_POST['capacity'];
            $usermodelname = (new \yii\db\Query())
                            ->select(['idmodellist', 'modelname', 'MIN(modelcapacity)'])
                            ->from('modellist')
                            ->where('>=', 'modelcapacity', '$_POST[`capacity`]')
                            ->limit(1);
        }
        echo $this->usermodelname;
        
    }*/
   
}