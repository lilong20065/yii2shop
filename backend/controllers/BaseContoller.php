<?php
/**
 * Created by 6789.cd
 * User: siye
 * Date: 2018/2/3 Time: 17:48
 */

namespace backend\controllers;

class BaseContoller extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        $permissionName = $action->controller->module->requestedRoute;
        if(!\Yii::$app->user->can($permissionName) && \Yii::$app->getErrorHandler()->exception === null){
            //throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获'.$permissionName.'操作的权限');
            $this->redirect(['public/unauthorized']);
            return false;
            //return true;
        }else{
            return true;
        }
    }
}