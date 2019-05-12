<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 07.05.2019
 * Time: 16:31
 */

namespace app\models;


use common\models\Answer;
use common\models\Question;
use common\models\Section;
use yii\base\Model;
use yii\web\UploadedFile;

class QuestionForm extends Model
{
    public $text;
    public $info;
    /**
     * @var UploadedFile
     */
    public $addition_file;
    public $type;
    public $answers;


    public function rules()
    {
        return [
            [['text','type','answers'],'required'],
            [['text','info'],'string'],
            [['type'],'integer'],
            ['addition_file','file','skipOnEmpty'=>true],
            ['answers','safe'],
        ];
    }

    public function create(){
        if($this->validate()){
            $question=new Question();
            if($this->addition_file){
                $this->addition_file->saveAs('files/questions/'.$this->addition_file->baseName.'.'.$this->addition_file->extension);
                $question->addition_file='files/questions/'.$this->addition_file->baseName.'.'.$this->addition_file->extension;
                $question->file_ext=$this->addition_file->extension;
            }
            $question->text=$this->text;
            $question->info=$this->info;
            $question->type=$this->type;
            $question->save();
            \Yii::error($question->errors);
            $this->createAnswers($question->id);
            return true;
        }
        return false;
    }

    private function createAnswers($question_id){
        if($this->type==2){
            $answer=new Answer();
            $answer->text=$this->answers;
            $answer->is_right=1;
            $answer->question_id=$question_id;
            $answer->save();
        }
        if($this->type==1){
            foreach ($this->answers as $item){
                $answer=new Answer();
                $answer->text=$item['text'];
                $answer->is_right=$item['is_right'];
                $answer->question_id=$question_id;
                $answer->save();
            }
        }
    }
}