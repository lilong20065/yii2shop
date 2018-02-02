<?php
/**
 * Created by 6789.cd
 * User: siye
 * Date: 2018/2/2 Time: 15:13
 */

namespace backend\controllers;


use yii\web\Controller;

class NewsController extends Controller
{
    //首页
    public function actionNewsList(){
        return $this->render('newslist');
    }
}