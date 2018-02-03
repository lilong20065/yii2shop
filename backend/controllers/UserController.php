<?php
/**
 * Created by 6789.cd
 * User: siye
 * Date: 2018/2/2 Time: 19:28
 */

namespace backend\controllers;


use yii\web\Controller;

class UserController extends Controller
{
    //用户列表
    public function actionUserList(){
        return $this->render('userlist');
    }

    //添加用户
    public function actionUserAdd(){
        return $this->render('useradd');
    }
}