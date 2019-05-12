<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 07.05.2019
 * Time: 23:45
 */

namespace backend\controllers;


use app\models\QuizForm;
use common\models\Question;
use common\models\Section;
use yii\web\Controller;
use Yii;

class QuizController extends Controller
{
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest){
            return false;
        }
        return true;
    }

    public function actionCreate(){
        $model=new QuizForm();
        if($model->load(Yii::$app->request->post()) && $model->create()){
            return true;
        }
        return $this->render('create',[
           'model'=>$model
        ]);
    }

    public function actionGetLists(){
        $sections=Section::find()->asArray()->all();
        $questions=Question::find()->asArray()->all();
        $result['questions']=$questions;
        $result['sections']=$sections;
        return json_encode($result);
    }
}