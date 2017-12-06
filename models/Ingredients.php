<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingredients".
 *
 * @property integer $ingredientid
 * @property string $ingredientname
 * @property string $type
 * @property string $family
 *
 * @property Ingredientslist[] $ingredientslists
 * @property Drinks[] $drinks
 */
class Ingredients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ingredients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ingredientname', 'type', 'family'], 'required'],
            [['ingredientname'], 'string', 'max' => 250],
            [['type', 'family'], 'string', 'max' => 256],
            [['ingredientname'], 'unique'],
            array('ingredientname','unique','message'=>'{attribute}:{value} already exists!'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ingredientid' => 'Ingredientid',
            'ingredientname' => 'Ingredientname',
            'type' => 'Type',
            'family' => 'Family',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredientslists()
    {
        return $this->hasMany(Ingredientslist::className(), ['ingredientid' => 'ingredientid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrinks()
    {
        return $this->hasMany(Drinks::className(), ['drinkid' => 'drinkid'])->viaTable('ingredientslist', ['ingredientid' => 'ingredientid']);
    }
}
