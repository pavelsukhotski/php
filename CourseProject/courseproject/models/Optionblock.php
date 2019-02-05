<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "optionblock".
 *
 * @property int $idoptionblock
 * @property string $optionblockname
 *
 * @property Optionsinblock[] $optionsinblocks
 */
class Optionblock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'optionblock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['optionblockname'], 'required'],
            [['optionblockname'], 'string', 'max' => 50],
            [['optionblockname'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idoptionblock' => 'Idoptionblock',
            'optionblockname' => 'Optionblockname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionsinblocks()
    {
        return $this->hasMany(Optionsinblock::className(), ['idoptionblock' => 'idoptionblock']);
    }
}
