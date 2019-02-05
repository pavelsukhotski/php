<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workingpress".
 *
 * @property int $idworkingpress
 * @property int $workingpress
 *
 * @property Stgencost[] $stgencosts
 * @property Modellist[] $modellistIdmodellists
 */
class Workingpress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workingpress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['workingpress'], 'required'],
            [['workingpress'], 'integer'],
            [['workingpress'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idworkingpress' => 'Idworkingpress',
            'workingpress' => 'Workingpress',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStgencosts()
    {
        return $this->hasMany(Stgencost::className(), ['workingpress_idworkingpress' => 'idworkingpress']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModellistIdmodellists()
    {
        return $this->hasMany(Modellist::className(), ['idmodellist' => 'modellist_idmodellist'])->viaTable('stgencost', ['workingpress_idworkingpress' => 'idworkingpress']);
    }
}
