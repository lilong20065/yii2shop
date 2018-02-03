<?php

/**
 * Created by 6789.cd
 * User: siye
 * Date: 2018/2/3 Time: 12:18
 */
namespace backend\models;

class Role extends \yii\db\ActiveRecord
{
    //这里继承了，不用自己定义属性
    public static function tableName()
    {
        return '{{%auth_item}}';
    }


}