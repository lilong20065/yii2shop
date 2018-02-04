<!DOCTYPE html>
<html class="loginHtml">
<head>
    <meta charset="utf-8">
    <title>登录--layui后台管理模板 2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" href="<?=Yii::$app->params['admin_web_url']?>/layui/favicon.ico">
    <link rel="stylesheet" href="<?=Yii::$app->params['admin_web_url']?>/layui/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="<?=Yii::$app->params['admin_web_url']?>/layui/css/public.css" media="all" />
</head>
<body class="loginBody">
<form class="layui-form">
    <div class="login_face"><img src="<?=Yii::$app->params['admin_web_url']?>/layui/images/face.jpg" class="userAvatar"></div>
    <div class="layui-form-item input-item">
        <label for="userName">用户名</label>
        <input type="text" placeholder="请输入用户名" id="userName" name="userName" class="layui-input" lay-verify="required">
    </div>
    <div class="layui-form-item input-item">
        <label for="password">密码</label>
        <input type="password" placeholder="请输入密码" id="password" name="password" class="layui-input" lay-verify="required">
    </div>
    <div class="layui-form-item input-item" id="imgCode">
        <label for="code">验证码</label>
        <input type="text" placeholder="请输入验证码" id="code" name="code" class="layui-input">
        <img src="<?=Yii::$app->params['admin_web_url']?>/layui/images/code.jpg">
    </div>
    <div class="layui-form-item">
        <input type="hidden" value="<?php echo Yii::$app->request->csrfToken; ?>" name="csrfbackend" >
        <button class="layui-btn layui-block" lay-filter="login" lay-submit>登录</button>
    </div>
    <div class="layui-form-item layui-row">
        <a href="javascript:;" class="seraph icon-qq layui-col-xs4 layui-col-sm4 layui-col-md4 layui-col-lg4"></a>
        <a href="javascript:;" class="seraph icon-wechat layui-col-xs4 layui-col-sm4 layui-col-md4 layui-col-lg4"></a>
        <a href="javascript:;" class="seraph icon-sina layui-col-xs4 layui-col-sm4 layui-col-md4 layui-col-lg4"></a>
    </div>
</form>
<script type="text/javascript" src="<?=Yii::$app->params['admin_web_url']?>/layui/layui/layui.js"></script>
<script type="text/javascript" src="<?=Yii::$app->params['admin_web_url']?>/assets/js/layui/login.js"></script>
<script type="text/javascript" src="<?=Yii::$app->params['admin_web_url']?>/layui/js/cache.js"></script>
</body>
</html>