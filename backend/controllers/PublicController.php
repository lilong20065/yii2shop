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
            /*echo 'None Login.';
            return false;*/
            return true;
        }else{
            return true;
        }
    }

    //index
    public function actionIndex(){
        //echo 1;
    }

    //ajax获得用户数据
    public function actionUserListJson(){
        $data['code'] = 0;
        $data['msg'] = '成功';
        $user = User::find()->asArray()->all();
        $data['data'] = $user;//Json::encode($user);
        //helper::dump(Json::encode($data));
        \Yii::$app->response->format = Response::FORMAT_JSON;  //Response::FORMAT_JSON;
        return $data;
    }

}