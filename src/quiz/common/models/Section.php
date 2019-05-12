<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "section".
 *
 * @property int $id
 * @property string $name
 * @property string $background
 * @property string $rules
 *
 * @property Question[] $questions
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'background','rules'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'background' => 'Background',
        ];
    }

    public function getQuizQuestions(){
        return $this->hasMany(QuizQuestion::className(), ['section_id' => 'id']);
    }

    public function getQuestions(){
        return $this->hasMany(Question::className(),['id'=>'question_id'])->via('quizQuestions');
    }
}
