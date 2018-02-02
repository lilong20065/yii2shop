<?php
/**
 * Created by 6789.cd
 * User: siye
 * Date: 2018/2/2 Time: 15:31
 */

namespace backend\controllers;


use yii\web\Controller;

class ImgController extends Controller
{
    //首页
    public function actionImages(){
        return $this->render('images');
    }
}