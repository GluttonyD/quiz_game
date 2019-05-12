<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 07.05.2019
 * Time: 16:40
 */

namespace backend\controllers;

use app\models\QuestionForm;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class QuestionController extends Controller
{
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('/site/login')->send();
        }
        return true;
    }

    public function actionCreate(){
        $model=new QuestionForm();
        if($model->load(Yii::$app->request->post())){
            $model->addition_file=UploadedFile::getInstance($model,'addition_file');
            if($model->create()){
                return true;
            }
        }
        return $this->render('create',[
            'model'=>$model
        ]);
    }
}