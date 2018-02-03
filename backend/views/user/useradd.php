<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加用户 - <?=Yii::$app->params['admin_web_name']?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="<?=Yii::$app->params['admin_web_url']?>/layui/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="<?=Yii::$app->params['admin_web_url']?>/layui/css/public.css" media="all" />
</head>
<body class="childrenBody">
<form class="layui-form">
    <div class="magb15 layui-col-md6 layui-col-xs12">
        <label class="layui-form-label">登录名</label>
        <div class="layui-input-block">
            <input type="text" class="layui-input username" name="username" lay-verify="required" placeholder="请输入登录名">
        </div>
    </div>
    <div class="magb15 layui-col-md6 layui-col-xs12">
        <label class="layui-form-label">真实姓名</label>
        <div class="layui-input-block">
            <input type="text" class="layui-input realname" name="realname" lay-verify="required" placeholder="请输入真实姓名">
        </div>
    </div>
    <div class="magb15 layui-col-md6 layui-col-xs12">
        <label class="layui-form-label">登录密码</label>
        <div class="layui-input-block">
            <input type="text" class="layui-input password" name="password" lay-verify="required" placeholder="请输入登录密码">
        </div>
    </div>
    <div class="magb15 layui-col-md6 layui-col-xs12">
        <label class="layui-form-label">确认密码</label>
        <div class="layui-input-block">
            <input type="text" class="layui-input repassword" name="repassword" lay-verify="required" placeholder="请输入确认密码">
        </div>
    </div>
    <div class="magb15 layui-col-md6 layui-col-xs12">
        <label class="layui-form-label">手机号</label>
        <div class="layui-input-block">
            <input type="text" class="layui-input tel" name="tel" lay-verify="required" placeholder="请输入手机号">
        </div>
    </div>
    <div class="magb15 layui-col-md6 layui-col-xs12">
        <label class="layui-form-label">邮箱</label>
        <div class="layui-input-block">
            <input type="text" class="layui-input email" name="email" lay-verify="emaila" placeholder="请输入邮箱">
        </div>
    </div>
    <div class="layui-row">
        <div class="magb15 layui-col-md4 layui-col-xs12">
            <label class="layui-form-label">性别</label>
            <div class="layui-input-block userSex">
                <input type="radio" name="sex" value="男" title="男" checked>
                <input type="radio" name="sex" value="女" title="女">
                <input type="radio" name="sex" value="保密" title="保密">
            </div>
        </div>
        <div class="magb15 layui-col-md4 layui-col-xs12">
            <label class="layui-form-label">用户角色</label>
            <div class="layui-input-block">
                <select name="roleid" class="userGrade" lay-filter="userGrade">
                    <option value="0">注册会员</option>
                    <option value="1">中级会员</option>
                    <option value="2">高级会员</option>
                    <option value="3">钻石会员</option>
                    <option value="4">超级会员</option>
                </select>
            </div>
        </div>
        <div class="magb15 layui-col-md4 layui-col-xs12">
            <label class="layui-form-label">会员状态</label>
            <div class="layui-input-block">
                <select name="status" class="userStatus" lay-filter="userStatus">
                    <option value="0">正常使用</option>
                    <option value="1">限制用户</option>
                </select>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">出生年月</label>
        <div class="layui-input-block">
            <input type="text" value="" placeholder="请输入出生年月" lay-verify="userBirthday" name="birthday" readonly class="layui-input userBirthday">
        </div>
    </div>
    <div class="layui-form-item userAddress">
        <label class="layui-form-label">家庭住址</label>
        <div class="layui-input-inline">
            <select name="province" lay-filter="province" class="province">
                <option value="">请选择市</option>
            </select>
        </div>
        <div class="layui-input-inline">
            <select name="city" lay-filter="city" disabled>
                <option value="">请选择市</option>
            </select>
        </div>
        <div class="layui-input-inline">
            <select name="area" lay-filter="area" disabled>
                <option value="">请选择县/区</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">掌握技术</label>
        <div class="layui-input-block userHobby">
            <input type="checkbox" name="like[javascript]" title="Javascript">
            <input type="checkbox" name="like[C#]" title="C#">
            <input type="checkbox" name="like[php]" title="PHP">
            <input type="checkbox" name="like[html]" title="HTML(5)">
            <input type="checkbox" name="like[css]" title="CSS(3)">
            <input type="checkbox" name="like[.net]" title=".net">
            <input type="checkbox" name="like[ASP]" title="ASP">
            <input type="checkbox" name="like[Angular]" title="Angular">
            <input type="checkbox" name="like[VUE]" title="VUE">
            <input type="checkbox" name="like[XML]" title="XML">
        </div>
    </div>
    <div class="layui-form-item layui-row layui-col-xs12">
        <label class="layui-form-label">用户简介</label>
        <div class="layui-input-block">
            <textarea placeholder="请输入用户简介" name="info" class="layui-textarea userDesc"></textarea>
        </div>
    </div>
    <div class="layui-form-item layui-row layui-col-xs12">
        <div class="layui-input-block">
            <input type="hidden" value="<?php echo Yii::$app->request->csrfToken; ?>" class="layui-input csrfbackend" name="csrfbackend" lay-verify="required" />
            <button class="layui-btn layui-btn-sm" lay-submit="" lay-filter="addUser">立即添加</button>
            <button type="reset" class="layui-btn layui-btn-sm layui-btn-primary">取消</button>
        </div>
    </div>
</form>
<script type="text/javascript" src="<?=Yii::$app->params['admin_web_url']?>/layui/layui/layui.js"></script>
<script type="text/javascript" src="<?=Yii::$app->params['admin_web_url']?>/assets/js/layui/userInfo.js"></script>
</body>
</html>