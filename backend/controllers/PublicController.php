<?php
/**
 * Created by 6789.cd
 * User: siye
 * Date: 2018/2/3 Time: 18:06
 */

namespace backend\controllers;



use backend\models\User;
use common\lee\helper;
use yii\helpers\Json;
use yii\web\Response;

class PublicController extends \yii\web\Controller
{
    //公共文件，不参与RBAC权限验证，比如AJAX获取数据等，但是需要用户是否登录
    public function beforeAction($action)
    {
        $user_id = \Yii::$app->user->getId();
        if($user_id==null){
            echo json_encode(['code'=>-6789,'message'=>'您无权限操作此项']);
            return false;
        }else{
            return true;
        }
    }

    //ajax获得用户数据
    //严格来说不应该放在这里，数据会被未授权用户看到
    public function actionUserListJson(){
        $data['code'] = 0;
        $data['msg'] = '成功';
        $user = User::find()->asArray()->all();
        $data['data'] = $user;
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return $data;
    }

    //404
    public function action404(){
        return $this->render('404');
    }

    //无权限
    public function actionUnauthorized(){
        return $this->render('unauthorized');
    }

}