<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 08.05.2019
 * Time: 14:53
 */

namespace backend\controllers;
use app\models\ResultsForm;
use common\models\CentrifugeModel;
use common\models\Question;
use common\models\QuizQuestion;
use common\models\QuizResult;
use common\models\Section;
use common\models\TmpUserAnswer;
use common\models\TmpUserQuestion;
use Yii;
use common\models\Quiz;
use yii\helpers\VarDumper;
use yii\web\Controller;
use common\models\User;

class GameController extends Controller
{
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('/site/login')->send();
        }
        return true;
    }

    public function actionStart(){
        $quiz=Quiz::find()->with('questions')->one();
        $question_count=QuizQuestion::find()->where(['quiz_id'=>$quiz->id])->count();
        return $this->render('game',[
            'quiz'=>$quiz,
            'count'=>$question_count
        ]);
    }

    public function actionGetSectionCount($section_id){
        /**
         * @var Section $section
         */
        $count=QuizQuestion::find()->where(['section_id'=>$section_id])->count();
        $section=Section::find()->where(['id'=>$section_id])->one();
        $response=[
            'count'=>$count,
            'background'=>$section->background
        ];
        return json_encode($response);
    }

    public function actionGetResults(){
        $model=new ResultsForm();
        if($model->load(Yii::$app->request->post()) && $model->results()){
            $results=QuizResult::find()->orderBy(['result'=>SORT_DESC])->all();
            $results_arr=QuizResult::find()->orderBy(['result'=>SORT_DESC])->asArray()->all();
            VarDumper::dump($results_arr);
            CentrifugeModel::send('game-results',$results_arr);
            return $this->render('show-results',[
                'results'=>$results
            ]);
        }
        if(Yii::$app->request->isAjax){
            CentrifugeModel::send("quiz-final",['data'=>'lalala']);
            return $this->redirect('/game/get-results')->send();
        }
        return $this->render('quiz-results',[
            'model'=>$model
        ]);
    }

    public function actionShowDump(){
        $dump=User::find()->with('dump')->all();
        return $this->render('dump',[
            'dump'=>$dump
        ]);
    }

    public function actionCleanDump(){
        $question_dump=TmpUserQuestion::find()->all();
        $answer_dump=TmpUserAnswer::find()->all();
        foreach ($question_dump as $item){
            $item->delete();
        }
        foreach ($answer_dump as $item){
            $item->delete();
        }
        return true;
    }

    public function actionSetQuestion($number=0){
        $quiz=Quiz::find()->one();
        $quiz->current_question=$number;
        $quiz->save();
        return true;

    }

    public function actionNextQuestion($current_question=null){
        /**
         * @var Quiz $quiz
         */
        $quiz=Quiz::find()->one();
        $quiz->current_question=$current_question;
        $quiz->save();
        CentrifugeModel::send("next-question",['data'=>'lalala']);
        return true;
    }

    public function actionSendAnswers(){
        CentrifugeModel::send("send-answers",['data'=>'lalala']);
        return true;
    }

    public function actionCloseSignal(){
        CentrifugeModel::send('close-modal',['data'=>'lalala']);
        return true;
    }

    public function actionShowStart(){
        CentrifugeModel::send('show-start',['data'=>'lalala']);
        return true;
    }

    public function actionCloseAllWindows(){
        CentrifugeModel::send('close-windows',['data'=>'lslslsls']);
        return true;
    }

    public function actionSaveDump(){
        CentrifugeModel::send('save-dump',['data'=>'lslslsls']);
        return true;
    }

    public function actionShowRules($section_id=null){
        /**
         * @var Section $section
         */
        if($section_id){
            $section=Section::find()->where(['id'=>$section_id])->one();
            CentrifugeModel::send('show-rules',['section_rules'=>$section->rules,'section_background'=>$section->background,'section_name'=>$section->name]);
        }
        else{CentrifugeModel::send('show-rules',['section_rules'=>0,'section_background'=>0]);}
        return json_encode(['section_rules'=>$section->rules,'section_background'=>$section->background,'section_name'=>$section->name]);
    }
    public function actionCloseRules($section_id=null){
        /**
         * @var Section $section
         */
        if($section_id){
            $section=Section::find()->where(['id'=>$section_id])->one();
            CentrifugeModel::send('close-rules',['section_rules'=>$section->rules,'section_background'=>$section->background]);
        }
        else{CentrifugeModel::send('close-rules',['section_rules'=>0,'section_background'=>0]);}
        return json_encode(['section_rules'=>$section->rules,'section_background'=>$section->background,'section_name'=>$section->name]);
    }
}