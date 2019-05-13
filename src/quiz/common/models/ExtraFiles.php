<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "extra_files".
 *
 * @property int $id
 * @property int $question_id
 * @property string $file
 */
class ExtraFiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'extra_files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question_id'], 'integer'],
            [['file'], 'string', 'max' => 255],
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
            'file' => 'File',
        ];
    }
}
