<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 08.05.2019
 * Time: 20:54
 */

namespace frontend\controllers;


use common\models\CentrifugeModel;
use yii\web\Controller;
use phpcent\Client;
use Yii;

class CentrifugeController extends Controller
{
    public function actionConnect(){
        $connect=CentrifugeModel::clientConnect(Yii::$app->user->getIdentity());
        return json_encode($connect);
    }
}