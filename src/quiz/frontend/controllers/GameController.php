<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 08.05.2019
 * Time: 19:31
 */

namespace frontend\controllers;


use common\models\Question;
use common\models\Quiz;
use common\models\QuizSection;
use frontend\models\QuizForm;
use yii\web\Controller;
use Yii;

class GameController extends Controller
{
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('/site/login')->send();
        }
        return true;
    }

    public function actionGame(){
        $quiz=Quiz::find()->one();
        return $this->render('game',[
           'quiz'=>$quiz
        ]);
    }

    public function actionResults(){
        $model=new QuizForm();
        if($model->load(\Yii::$app->request->post())){
            $model->result();
        }
        return true;
    }

    public function actionGetDump(){
        $model=new QuizForm();
        if($model->load(\Yii::$app->request->post())){
            $model->getDump();
        }
        return true;
    }

    public function actionGetFile($question_id){
        /**
         * @var Question $question
         */
        $question=Question::find()->where(['id'=>$question_id])->one();
        if($question->addition_file){
            return json_encode(['file'=>$question->addition_file]);
        }
    }
}