<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "drinkratings".
 *
 * @property integer $rating
 * @property integer $userid
 * @property integer $drinkid
 *
 * @property Drinks $drink
 * @property Users $user
 */
class Drinkratings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drinkratings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rating', 'userid', 'drinkid'], 'required'],
            [['rating', 'userid', 'drinkid'], 'integer'],
            [['drinkid'], 'exist', 'skipOnError' => true, 'targetClass' => Drinks::className(), 'targetAttribute' => ['drinkid' => 'drinkid']],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userid' => 'userid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rating' => 'Rating',
            'userid' => 'Userid',
            'drinkid' => 'Drinkid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrink()
    {
        return $this->hasOne(Drinks::className(), ['drinkid' => 'drinkid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['userid' => 'userid']);
    }
}
