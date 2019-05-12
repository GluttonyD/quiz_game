<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quiz".
 *
 * @property int $id
 * @property string $name
 * @property int $created_by
 *
 * @property User $author
 * @property QuizQuestion[] $quizQuestions
 * @property Question[] $questions
 * @property Section[] $sections
 */
class Quiz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'created_by' => 'Автор',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizQuestions()
    {
        return $this->hasMany(QuizQuestion::className(), ['quiz_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions(){
        return $this->hasMany(Question::className(),['id'=>'question_id'])->via('quizQuestions');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizSections(){
        return $this->hasMany(QuizSection::className(),['quiz_id'=>'id']);
    }

    public function getSections(){
        return $this->hasMany(Section::className(),['id'=>'section_id'])->via('quizSections');
    }
}
