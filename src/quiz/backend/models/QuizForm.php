<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 08.05.2019
 * Time: 0:04
 */

namespace app\models;


use common\models\Question;
use common\models\Section;
use yii\base\Model;

class QuizForm extends Model
{
    public $name;
    public $sections;
    public $questions;

    public $question_list;
    public $section_list;

    public function rules()
    {
        return [
            ['name','string'],
            [['sections','questions'],'safe'],
            [['name','sections','questions'],'required'],
        ];
    }

    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->question_list=Question::find()->all();
        $this->section_list=Section::find()->all();
    }

    public function create(){
        if($this->validate()){
            return true;
        }
        return false;
    }

}