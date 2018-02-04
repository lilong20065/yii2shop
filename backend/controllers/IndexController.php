<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/2
 * Time: 14:04
 */

namespace backend\controllers;


use backend\models\User;
use yii\web\Controller;
use yii\web\Response;

class IndexController extends Controller
{
    //不适用母版页
    public $layout = false;
    //系统首页
    public function actionIndex(){
        //简单的SESSION操作
        $admin_name = \Yii::$app->session->get('admin_name');
        if(!$admin_name){
            return $this->redirect(['index/login']);exit;
        }
        return $this->render('index');
    }

    //登录页面
    public function actionLogin(){

        return $this->render('login');
    }

    //ajax登录
    public function actionAjaxLogin(){
        //简单的SESSION操作
        \Yii::$app->session->set('admin_name','管理员');
        $user = User::findOne(2);
        \Yii::$app->user->login($user);

        \Yii::$app->response->format = Response::FORMAT_JSON;
        return ['code'=>1,'message'=>'登录成功'];
    }

    //退出登录
    public function actionLogout(){
        \Yii::$app->session->destroy();
        $this->redirect(['index/login']);
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}