<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stgencost".
 *
 * @property int $workingpress_idworkingpress
 * @property int $modellist_idmodellist
 * @property int $stgencost
 *
 * @property Modellist $modellistIdmodellist
 * @property Workingpress $workingpressIdworkingpress
 */
class Stgencost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stgencost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['workingpress_idworkingpress', 'modellist_idmodellist', 'stgencost'], 'required'],
            [['workingpress_idworkingpress', 'modellist_idmodellist', 'stgencost'], 'integer'],
            [['stgencost'], 'unique'],
            [['workingpress_idworkingpress', 'modellist_idmodellist'], 'unique', 'targetAttribute' => ['workingpress_idworkingpress', 'modellist_idmodellist']],
            [['modellist_idmodellist'], 'exist', 'skipOnError' => true, 'targetClass' => Modellist::className(), 'targetAttribute' => ['modellist_idmodellist' => 'idmodellist']],
            [['workingpress_idworkingpress'], 'exist', 'skipOnError' => true, 'targetClass' => Workingpress::className(), 'targetAttribute' => ['workingpress_idworkingpress' => 'idworkingpress']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'workingpress_idworkingpress' => 'Workingpress Idworkingpress',
            'modellist_idmodellist' => 'Modellist Idmodellist',
            'stgencost' => 'Stgencost',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModellistIdmodellist()
    {
        return $this->hasOne(Modellist::className(), ['idmodellist' => 'modellist_idmodellist']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkingpressIdworkingpress()
    {
        return $this->hasOne(Workingpress::className(), ['idworkingpress' => 'workingpress_idworkingpress']);
    }
}
