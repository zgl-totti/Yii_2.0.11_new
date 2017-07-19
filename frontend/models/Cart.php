<?php
namespace frontend\models;

use backend\models\Goods;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord{
    public static function tableName(){
        return "{{%cart}}";
    }

    public function getGoods(){
        return $this->hasOne(Goods::className(),['id'=>'gid']);
    }
}