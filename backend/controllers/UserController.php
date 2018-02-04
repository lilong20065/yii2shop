<?php
/**
 * Created by 6789.cd
 * User: siye
 * Date: 2018/2/2 Time: 19:28
 */

namespace backend\controllers;


use backend\models\User;
use backend\models\UserForm;
use common\lee\helper;
use yii\web\Request;
use yii\web\Response;


class UserController extends BaseContoller
{
    //用户列表
    public function actionUserList(){
        if(\Yii::$app->request->isAjax){
            $data['code'] = 0;
            $data['msg'] = '成功';
            $user = User::find()->asArray()->all();
            $data['data'] = $user;
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return $data;
        }
        return $this->render('userlist');
    }

    //添加用户
    public function actionUserAdd(){

        //添加角色
        if(\Yii::$app->request->isAjax){
            //返回数据格式
            \Yii::$app->response->format = Response::FORMAT_JSON;
            //获取AJAX数据
            $post = \Yii::$app->request->post();
            //实例化USER类
            $model = new User();
            //排除非数据库字段，不然MODEL会报错
            unset($post['_csrf-backend']);
            unset($post['repassword']);
            //自动加载全部数据到MODEL
            $model->load($post,'');
            //再次验证数据，永远不要相信用户提交的数据0
            if($model->validate()){
                if($model->save()){
                    return ['code'=>1,'message'=>'添加成功'];
                }else{
                    return ['code'=>0,'message'=>$model->getErrors()];
                }
            }else{
                return ['code'=>0,'message'=>$model->getErrors()];
            }
            //echo json_encode($data);exit;
        }

        return $this->render('useradd');
    }

    public function actionCroles(){
        $name['name'] = 'user/user-list';
        $name['description'] = 'user/user-list info';
        $this->createPermission($name);
    }
    //添加角色和权限
    //创建权限
    public function createPermission($name)
    {
        $auth = \Yii::$app->authManager;
        $createPost = $auth->createPermission($name['name']);
        $createPost->description = $name['description'];
        $auth->add($createPost);
    }

    public function actionCrole(){
        $name = 1;
        //$name['description'] = '管理员';
        $this->createRole($name);
    }
    //创建角色
    public function createRole($name)
    {
        $auth = \Yii::$app->authManager;
        $role = $auth->createRole($name);
        $role->description = '创建了 ' . $name. ' 角色';
        $auth->add($role);
    }


    //添加用户、角色和权限之间的关系
    //将权限赋给角色 注意：创建的角色和权限对象，必须已经在数据库中创建，比如items['role'] = test,否则会报错
    public function addChild($items)
    {
        $auth = \Yii::$app->authManager;
        $parent = $auth->createRole($items['name']);                //创建角色对象
        $child = $auth->createPermission($items['description']);     //创建权限对象
        $auth->addChild($parent, $child);                           //添加对应关系
    }

    //将角色赋给用户
    public function addRoleUser($items)
    {
        $auth = \Yii::$app->authManager;
        $role = $auth->createRole($items['role']);                //创建角色对象
        $user_id = 1;                                             //获取用户id，此处假设用户id=1
        $auth->assign($role, $user_id);                           //添加对应关系
    }

    //读取所有action
    public function actionInit()
    {
        $trans = \Yii::$app->db->beginTransaction();
        try {
            //构建控制器目录
            $dir = dirname(dirname(__FILE__)). '/controllers';
            //找到控制器目录下的所有文件
            $controllers = glob($dir. '/*');
            $permissions = [];
            //Helper::dump($dir);
            //Helper::dump($controllers);
            //unset($controllers[1]);
            foreach ($controllers as $controller) {
                //Helper::dump($controller);
                $content = file_get_contents($controller);
                //Helper::dump($content);
                //找到Controller即可
                preg_match('/class ([a-zA-Z]+)Controller/', $content, $match);
                $cName = $match[1];
                $permissions[] = strtolower($cName. '/*');
                //正则匹配文本中的所以action
                preg_match_all('/public function action([a-zA-Z_]+)/', $content, $matches);
                foreach ($matches[1] as $aName) {
                    $permissions[] = strtolower($cName. '/'. $aName);
                }
            }
            $auth = \Yii::$app->authManager;
            //Helper::dump($permissions);
            //为什么$auth可以操作到该表
            foreach ($permissions as $permission) {
                //是否存在该权限
                if (!$auth->getPermission($permission)) {
                    $obj = $auth->createPermission($permission);
                    $obj->description = $permission;
                    $auth->add($obj);
                }

            }
            $trans->commit();
            echo "import success \n";
        } catch(\Exception $e) {
            $trans->rollback();
            echo "import failed \n";
        }
    }

    //初始化测试数据
    public function actionNewInit()
    {
        $auth = \Yii::$app->authManager;

        // add "createPost" permission 添加“创建文章”的权限
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // add "updatePost" permission 添加“更新文章”的权限
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // add "author" role and give this role the "createPost" permission
        //创建一个“作者”角色，并给它“创建文章”的权限
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        // 添加“admin”角色，给它“更新文章”的权限
        // “作者”角色
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        // 给用户指定角色，1和2是IdentityInterface::getId()返回的ID，就是用户ID。
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
        echo 1;exit;
    }

    //publi test
    public function actionTest(){

        $controller = \Yii::$app->controller->id;
        $action = \Yii::$app->controller->action->id;
        $permissionName = $controller.'/'.$action;
        if(!\Yii::$app->user->can($permissionName) && \Yii::$app->getErrorHandler()->exception === null){
            throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获'.$permissionName.'操作的权限');
        }

        $user = User::findOne('1');
        Helper::dump($user);
        \Yii::$app->user->login($user);
        Helper::dump(\Yii::$app->user);

    }

    //权限测试
    public function actionIsOk(){
        /*$action = \Yii::$app->controller->action->id;
        helper::dump(\Yii::$app->user);
        //exit;
        if(\Yii::$app->user->can($action)){
            return true;
        }else{
            throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获'.$action.'操作的权限');
        }*/

        $controller = \Yii::$app->controller->id;
        $action = \Yii::$app->controller->action->id;
        $permissionName = $controller.'/'.$action;
        if(!\Yii::$app->user->can($permissionName) && \Yii::$app->getErrorHandler()->exception === null){
            throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获'.$permissionName.'操作的权限');
        }else{
            echo 'ok';exit;
        }
    }

}