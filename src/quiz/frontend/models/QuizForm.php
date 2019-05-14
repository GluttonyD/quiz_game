<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 11.05.2019
 * Time: 19:10
 */

namespace frontend\models;


use common\models\Answer;
use common\models\Question;
use common\models\TmpUserAnswer;
use common\models\TmpUserQuestion;
use common\models\UserAnswer;
use common\models\UserQuestion;
use yii\base\Model;

class QuizForm extends Model
{
    public $answers=[];

    public function rules()
    {
        return [
            ['answers','required'],
            ['answers','safe'],
        ];
    }

    public function result(){
        /**
         * @var UserAnswer $answer_result
         * @var Question $question
         */
        $is_right=1;
        if($this->validate()){
            foreach ($this->answers as $element){
                $question=Question::find()->where(['id'=>$element['question_id']])->one();
                \Yii::warning($element);
                $userQuestion=new UserQuestion();
                $userQuestion->user_id=\Yii::$app->user->getId();
                $userQuestion->question_id=$question->id;
                $userQuestion->save();
                foreach ($element['items'] as $id => $item){
                    $answer_result=new UserAnswer();
                    $answer_result->user_id=\Yii::$app->user->getId();
                    if($question->type==1) {
                        $answer_result->is_right = $item['is_right'];
                    }
                    if($question->type==2){
                        $answer_result->text=$item['answer'];
                    }
                    $answer_result->question_id=$element['question_id'];
                    $answer_result->answer_id=$id;
                    $answer_result->save();
                }
            }
            return true;
        }
    }
    public function getDump(){
        /**
         * @var TmpUserAnswer $answer_result
         * @var Question $question
         */
        $is_right=1;
        if($this->validate()){
            foreach ($this->answers as $element){
                $question=Question::find()->where(['id'=>$element['question_id']])->one();
                \Yii::warning($element);
                $userQuestion=new TmpUserQuestion();
                $userQuestion->user_id=\Yii::$app->user->getId();
                $userQuestion->question_id=$question->id;
                $userQuestion->save();
                foreach ($element['items'] as $id => $item){
                    $answer_result=new TmpUserAnswer();
                    $answer_result->user_id=\Yii::$app->user->getId();
                    if($question->type==1) {
                        $answer_result->is_right = $item['is_right'];
                    }
                    if($question->type==2){
                        $answer_result->text=$item['answer'];
                    }
                    $answer_result->question_id=$element['question_id'];
                    $answer_result->answer_id=$id;
                    $answer_result->save();
                }
            }
            return true;
        }
    }
}