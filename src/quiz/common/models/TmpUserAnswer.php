<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tmp_user_answer".
 *
 * @property int $id
 * @property int $user_id
 * @property int $question_id
 * @property int $answer_id
 * @property int $is_right
 * @property string $text
 * @property TmpUserAnswer[] $dumpAnswers
 * @property Answer $answer
 */
class TmpUserAnswer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tmp_user_answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'question_id', 'answer_id', 'is_right'], 'integer'],
            [['text'], 'string', 'max' => 255],
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
            'answer_id' => 'Answer ID',
            'is_right' => 'Is Right',
            'text' => 'Text',
        ];
    }

    public function getAnswer(){
        return $this->hasOne(Answer::className(),['id'=>'answer_id']);
    }

    public function getDumpAnswers(){
        return $this->hasMany(TmpUserAnswer::className(),['question_id'=>'question_id']);
    }
}
