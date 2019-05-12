<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 05.05.2019
 * Time: 18:26
 */

namespace backend\controllers;


use common\models\User;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionFirstUser(){
        $user=new User();
        $user->username='admin';
        $user->password_hash=(string)\Yii::$app->security->generatePasswordHash('12345');
        $user->email='admin@mail.ru';
        $user->save();
        return json_encode(['error'=>$user->errors]);
    }
}