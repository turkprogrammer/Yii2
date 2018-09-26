<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $parent_id
 * @property int $post_id
 * @property string $username
 * @property string $text
 * @property string $date
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'post_id', 'username', 'text', 'date'], 'required'],
            [['parent_id', 'post_id'], 'integer'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['username'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'post_id' => 'Post ID',
            'username' => 'Username',
            'text' => 'Text',
            'date' => 'Date',
        ];
    }
}
