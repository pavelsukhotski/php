<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modellist".
 *
 * @property int $idmodellist
 * @property string $modelname
 * @property int $modelcapacity
 *
 * @property Optionscost[] $optionscosts
 * @property Stgencost[] $stgencosts
 * @property Workingpress[] $workingpressIdworkingpresses
 */
class Modellist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modellist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modelname', 'modelcapacity'], 'required'],
            [['modelcapacity'], 'integer'],
            [['modelname'], 'string', 'max' => 15],
            [['modelname'], 'unique'],
            [['modelcapacity'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmodellist' => 'Idmodellist',
            'modelname' => 'Modelname',
            'modelcapacity' => 'Modelcapacity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionscosts()
    {
        return $this->hasMany(Optionscost::className(), ['idmodellist' => 'idmodellist']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStgencosts()
    {
        return $this->hasMany(Stgencost::className(), ['modellist_idmodellist' => 'idmodellist']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkingpressIdworkingpresses()
    {
        return $this->hasMany(Workingpress::className(), ['idworkingpress' => 'workingpress_idworkingpress'])->viaTable('stgencost', ['modellist_idmodellist' => 'idmodellist']);
    }
}
