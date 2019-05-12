<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 12.05.2019
 * Time: 14:42
 */

namespace app\models;


use common\models\QuizResult;
use common\models\User;
use yii\base\Model;

class ResultsForm extends Model
{
    public $quiz_id;
    public $results = [];

    /**
     * @var User[]
     */
    public $users;

    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->users = User::find()->with('questions.answers')->all();
    }

    public function rules()
    {
        return [
            [['results', 'quiz_id'], 'required'],
            ['results', 'safe'],
            ['quiz_id', 'integer']
        ];
    }

    public function results()
    {
        if ($this->validate()) {
            foreach ($this->results as $id => $result) {
                $userResult = new QuizResult();
                $userResult->user_id = $id;
                $userResult->result = (integer)$result;
                $userResult->quiz_id=$this->quiz_id;
                $userResult->save();
                \Yii::debug($result);
            }
            return true;
        }
        return false;
    }
}