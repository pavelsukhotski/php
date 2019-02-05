<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "optionscost".
 *
 * @property int $idmodellist
 * @property int $idoptionscost
 * @property int $optionscost
 * @property int $optionsinblock_idoptionsinblock
 *
 * @property Optionsinblock $optionsinblockIdoptionsinblock
 * @property Modellist $modellist
 */
class Optionscost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'optionscost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmodellist', 'optionscost', 'optionsinblock_idoptionsinblock'], 'required'],
            [['idmodellist', 'optionscost', 'optionsinblock_idoptionsinblock'], 'integer'],
            [['optionsinblock_idoptionsinblock'], 'exist', 'skipOnError' => true, 'targetClass' => Optionsinblock::className(), 'targetAttribute' => ['optionsinblock_idoptionsinblock' => 'idoptionsinblock']],
            [['idmodellist'], 'exist', 'skipOnError' => true, 'targetClass' => Modellist::className(), 'targetAttribute' => ['idmodellist' => 'idmodellist']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmodellist' => 'Idmodellist',
            'idoptionscost' => 'Idoptionscost',
            'optionscost' => 'Optionscost',
            'optionsinblock_idoptionsinblock' => 'Optionsinblock Idoptionsinblock',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionsinblockIdoptionsinblock()
    {
        return $this->hasOne(Optionsinblock::className(), ['idoptionsinblock' => 'optionsinblock_idoptionsinblock']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModellist()
    {
        return $this->hasOne(Modellist::className(), ['idmodellist' => 'idmodellist']);
    }
}
