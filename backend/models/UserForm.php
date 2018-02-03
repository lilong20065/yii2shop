<?php
/**
 * Created by 6789.cd
 * User: siye
 * Date: 2018/2/3 Time: 22:35
 */

namespace backend\models;

use Yii;
use yii\base\Model;

class UserForm extends Model
{
    public $username;
    public $realname;
    public $csrfbackend;
    public $password;
    public $repassword;
    public $tel;
    public $email;
    public $sex;
    public $roleid;
    public $status;
    public $birthday;
    public $province;
    public $city;
    public $area;
    public $info;

    public function rules()
    {
        return [
                [
                    [
                        'username',
                        'realname',
                        'password',
                        'repassword',
                        'tel',
                        'email',
                        'sex',
                        'roleid',
                        'birthday',
                        'province',
                        'city',
                        'area',
                        'info'
                    ], 'required'
                ]
        ];
    }

}