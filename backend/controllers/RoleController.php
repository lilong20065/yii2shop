<?php
/**
 * Created by 6789.cd
 * User: siye
 * Date: 2018/2/2 Time: 20:06
 */

namespace backend\controllers;


use yii\web\Controller;

class RoleController extends Controller
{
    //角色控制
    public function actionIndex(){
        return $this->render('index');
    }
}