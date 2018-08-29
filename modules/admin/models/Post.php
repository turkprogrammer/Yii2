<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "post".
 *
 * @property string $id
 * @property string $category_id
 * @property string $title
 * @property string $excerpt
 * @property string $text
 * @property string $keywords
 * @property string $description
 * @property string $created
 * @property string $updated
 */
class Post extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'post';
    }

    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /*
     * при обновлении изменилось только значение поля updated. 
     * В качестве атрибутов  указали, что перед добавлением записи поведение сгенерирует 
     * данные для полей created и updated, а перед событием UPDATE (обновлением) – обновим значение поля updated. 
     * Также в качестве значения будет записан «человеческий» формат даты (по умолчанию это метка времени).
     */

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(), //поведение TimestampBehavior, благодаря которому для статей назначаются дата и время их создания или изменения без нашего участия, т.е. автоматически
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created', 'updated'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['category_id', 'title', 'excerpt', 'text'], 'required'],
            [['category_id'], 'integer'],
            [['text'], 'string'],
            [['created', 'updated'], 'safe'],
            [['title', 'excerpt', 'keywords', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'title' => 'Title',
            'excerpt' => 'Excerpt',
            'text' => 'Text',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'created' => 'Created',
            'updated' => 'Обновлено',
        ];
    }

}
