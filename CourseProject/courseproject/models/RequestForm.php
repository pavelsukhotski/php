<?php
namespace app\models;

use yii\base\Model;

class RequestForm extends \yii\base\Model
{
    public $capacity;
    public $pressure;

    public function rules()
    {
        return [
            [['capacity', 'pressure'], 'required'],
            ['capacity', 'compare', 'compareValue' => 150, 'operator' => '>=', 'type' => 'number'],
            ['capacity', 'compare', 'compareValue' => 20000, 'operator' => '<=', 'type' => 'number'],
            ['pressure', 'compare', 'compareValue' => 5, 'operator' => '>=', 'type' => 'number'],
            ['pressure', 'compare', 'compareValue' => 60, 'operator' => '<=', 'type' => 'number'],

        ];
    }
}