<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

//use Yii;
use yii\base\Model;

/**
 * Description of Test
 *
 * @author ys
 */
class Test extends Model {

    public $idmodellist;
    public $idworkingpress;
    public $idoptionsinblock;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['idmodellist', 'idworkingpress', 'idoptionsinblock'], 'required'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

}
