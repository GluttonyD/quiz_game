<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tmp_user_question".
 *
 * @property int $id
 * @property int $user_id
 * @property int $question_id
 * @property TmpUserAnswer[] $answers
 * @property Question $info
 */
class TmpUserQuestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tmp_user_question';
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

    public function getInfo(){
        return $this->hasOne(Question::className(),['id'=>'question_id']);
    }

    public function getAnswers(){
        return $this->hasMany(TmpUserAnswer::className(),['question_id'=>'id']);
    }
}
