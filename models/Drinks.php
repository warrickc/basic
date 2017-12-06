<?php

namespace app\models;

use Yii;
use app\models\Drinkratings;

/**
 * This is the model class for table "drinks".
 *
 * @property integer $drinkid
 * @property string $drinkname
 * @property string $instructions
 *
 * @property Drinkratings[] $drinkratings
 * @property Users[] $users
 * @property Ingredientslist[] $ingredientslists
 * @property Ingredients[] $ingredients
 */
class Drinks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drinks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['drinkname', 'instructions'], 'required'],
            [['drinkname', 'instructions'], 'string', 'max' => 250],
            [['averagerating'], 'number', 'max' => 10],
            [['drinkname'], 'unique'],
            array('drinkname','unique','message'=>'{attribute}:{value} already exists!'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'drinkid' => 'Drinkid',
            'drinkname' => 'Drinkname',
            'instructions' => 'Instructions',
            'averagerating' => 'averagerating'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrinkratings()
    {
        return $this->hasMany(Drinkratings::className(), ['drinkid' => 'drinkid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['userid' => 'userid'])->viaTable('drinkratings', ['drinkid' => 'drinkid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredientslists()
    {
        return $this->hasMany(Ingredientslist::className(), ['drinkid' => 'drinkid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasMany(Ingredients::className(), ['ingredientid' => 'ingredientid'])->viaTable('ingredientslist', ['drinkid' => 'drinkid']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public static function get_drink_ratings($id){
      $query = Drinkratings::find()->where(["drinkid" => $id])->one();

      if(!empty($query)){
        return $query->rating;
      }
      return null;
    }

    /*public static function get_user_ratings($id){
      $query = Drinkratings::find()->where(["drinkid" => $id])->one();


      if(!empty($query)){
        return $query->rating;
      }
      return null;
    }*/
}
