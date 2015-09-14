<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%blog}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $category
 * @property string $tag
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviors(){
        return[
            BlameableBehavior::className(),
            TimestampBehavior::className()
        ];
    }

    public static function tableName()
    {
        return '{{%blog}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['category', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['title', 'tag'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'ชื่อเรื่อง',
            'content' => 'เนื้อหา',
            'category' => 'หมวดหมู่',
            'tag' => 'คำค้น',
            'created_at' => 'สร้างวันที่',
            'created_by' => 'สร้างโดย',
            'updated_at' => 'แก้ไขวันที่',
            'updated_by' => 'แก้ไขโดย',
        ];
    }

    /**
     * @inheritdoc
     * @return BlogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BlogQuery(get_called_class());
    }
}
