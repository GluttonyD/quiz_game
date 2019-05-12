<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_answer".
 *
 * @property int $id
 * @property int $question_id
 * @property int $answer_id
 * @property int $is_right
 * @property int $user_id
 * @property string $text
 * @property Answer $answer
 * @property Question $question
 */
class UserAnswer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question_id', 'answer_id', 'is_right','user_id'], 'integer'],
            ['text','string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_id' => 'Question ID',
            'answer_id' => 'Answer ID',
            'is_right' => 'Is Right',
        ];
    }

    public function getAnswer(){
        return $this->hasOne(Answer::className(),['id'=>'answer_id']);
    }

    public function getQuestion(){
        return $this->hasOne(Question::className(),['id'=>'question_id']);
    }
}
