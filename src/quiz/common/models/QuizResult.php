<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quiz_result".
 *
 * @property int $id
 * @property int $user_id
 * @property int $quiz_id
 * @property int $result
 */
class QuizResult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'quiz_id', 'result'], 'integer'],
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
            'quiz_id' => 'Quiz ID',
            'result' => 'Result',
        ];
    }
}
