<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 08.05.2019
 * Time: 21:00
 */

namespace common\models;


use yii\base\Model;

class CentrifugeModel extends Model
{
    public static function send($channel,$message){
        $client = new \phpcent\Client("http://tracking.elo-group.com:8000");
        $client->setSecret('potato');
        $client->publish($channel,$message);
    }

    public static function clientConnect($user){
        /**
         * @var User $user
         */
        $access=[];
        $client = new \phpcent\Client("http://tracking.elo-group.com:8000");
        $time=time();
        $token=$client->setSecret('potato')->generateClientToken($user->id,$time);
        $access['user']=$user->id;
        $access['user_name']=$user->username;
        $access['timestamp']=$time;
        $access['token']=$token;
        return $access;
    }
}