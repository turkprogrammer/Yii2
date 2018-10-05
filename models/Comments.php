<?php

namespace app\models;

use Yii;
use yii\db\Expression;
/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $parent_id
 * @property int $post_id
 * @property string $username
 * @property string $text
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(), //поведение TimestampBehavior, благодаря которому для статей назначаются дата и время их создания или изменения без нашего участия, т.е. автоматически
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['date'],
                    /*ActiveRecord::EVENT_BEFORE_UPDATE => ['updated'],*/
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }
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
            [['parent_id', 'post_id', 'username', 'text'], 'required'],
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
            'text' => 'Оставить комментарий',
        ];
    }
}
