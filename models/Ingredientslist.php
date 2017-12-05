<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingredientslist".
 *
 * @property integer $drinkid
 * @property integer $ingredientid
 * @property string $quantity
 *
 * @property Drinks $drink
 * @property Ingredients $ingredient
 */
class Ingredientslist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ingredientslist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['drinkid', 'ingredientid', 'quantity'], 'required'],
            [['drinkid', 'ingredientid'], 'integer'],
            [['quantity'], 'string', 'max' => 250],
            [['drinkid'], 'exist', 'skipOnError' => true, 'targetClass' => Drinks::className(), 'targetAttribute' => ['drinkid' => 'drinkid']],
            [['ingredientid'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredients::className(), 'targetAttribute' => ['ingredientid' => 'ingredientid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'drinkid' => 'Drinkid',
            'ingredientid' => 'Ingredientid',
            'quantity' => 'Quantity',
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
    public function getIngredient()
    {
        return $this->hasOne(Ingredients::className(), ['ingredientid' => 'ingredientid']);
    }
}
