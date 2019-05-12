<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_question".
 *
 * @property int $id
 * @property int $user_id
 * @property int $question_id
 * @property UserAnswer[] $answers
 * @property Question $info
 */
class UserQuestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'question_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'question_id' => 'Question ID',
        ];
    }

    public function getAnswers(){
        return $this->hasMany(UserAnswer::className(),['question_id'=>'question_id']);
    }

    public function getInfo(){
        return $this->hasOne(Question::className(),['id'=>'question_id']);
    }
}
