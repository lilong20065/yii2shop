<?php
/**
 * Created by 6789.cd
 * User: siye
 * Date: 2018/2/2 Time: 20:15
 */

namespace backend\controllers;


use yii\web\Controller;

class ActionController extends Controller
{
    //控制器列表
    public function actionIndex(){
        return $this->render('index');
    }
}