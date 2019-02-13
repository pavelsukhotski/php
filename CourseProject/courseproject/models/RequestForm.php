<?php
namespace app\models;

use yii\base\Model;

class RequestForm extends \yii\base\Model
{
    //public $capacity;
    //public $pressure;
    //public $usermodelname;
    public $idmodellist;
    public $idworkingpress;
  //public $idoptionblock;
    public $idoptionsinblock;
    //public $optionsinblockname;
    //public $val;

    public function rules()
    {
        return [
       /*     [['capacity', 'pressure'], 'required'],
            ['capacity', 'compare', 'compareValue' => 150, 'operator' => '>=', 'type' => 'number'],
            ['capacity', 'compare', 'compareValue' => 20000, 'operator' => '<=', 'type' => 'number'],
            ['pressure', 'compare', 'compareValue' => 5, 'operator' => '>=', 'type' => 'number'],
            ['pressure', 'compare', 'compareValue' => 60, 'operator' => '<=', 'type' => 'number'],*/
            [['idmodellist', 'idworkingpress', 'idoptionsinblock'], 'required'],

        ];
    }
    
    public function stgencost($idmodelname, $idworkingpressure) {
        
            //$usermodelname = SELECT idmodellist, modelname, MIN(modelcapacity) FROM modellist WHERE `modelcapacity` >= $_POST['capacity'];
            $stgencost = (new \yii\db\Query())
                            ->select(['stgencost'])
                            ->from('stgencost')
                            ->where('stgencost.modellist_idmodellist', '=', $idmodelname)
                            ->andWhere('stgencost.workingpress_idworkingpress', '=', $idworkingpressure)
                            ->limit(1);
        
        echo $stgencost;
        
    }
   
}