<?php

//namespace app\models;
namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $category_id
 * @property string $date
 * @property string $content
 *
 * @property Category $category
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'category_id', 'date'], 'required'],
            [['category_id'], 'integer'],
            [['date'], 'safe'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'category' => 'Категория',
            'category_id' => 'Категория',
            'date' => 'Дата',
            'content' => 'Содержание',
            'contshort' => 'Краткое содержание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(NewsCategory::className(), ['id' => 'category_id']);
    }
    
    public function getContshort() {
        return mb_substr($this->content,0,256,'utf8');
       // return strrev($this->'Content');
    }
}
