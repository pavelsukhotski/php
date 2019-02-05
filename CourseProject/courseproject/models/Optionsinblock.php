<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "optionsinblock".
 *
 * @property int $idoptionblock
 * @property string $optionsinblockname
 * @property int $idoptionsinblock
 *
 * @property Optionscost[] $optionscosts
 * @property Optionblock $optionblock
 */
class Optionsinblock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'optionsinblock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idoptionblock', 'optionsinblockname'], 'required'],
            [['idoptionblock'], 'integer'],
            [['optionsinblockname'], 'string', 'max' => 100],
            [['optionsinblockname'], 'unique'],
            [['idoptionblock'], 'exist', 'skipOnError' => true, 'targetClass' => Optionblock::className(), 'targetAttribute' => ['idoptionblock' => 'idoptionblock']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idoptionblock' => 'Idoptionblock',
            'optionsinblockname' => 'Optionsinblockname',
            'idoptionsinblock' => 'Idoptionsinblock',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionscosts()
    {
        return $this->hasMany(Optionscost::className(), ['optionsinblock_idoptionsinblock' => 'idoptionsinblock']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionblock()
    {
        return $this->hasOne(Optionblock::className(), ['idoptionblock' => 'idoptionblock']);
    }
}
