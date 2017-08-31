<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "todo_items".
 *
 * @property integer $todo_list_id
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property string $completed_at
 * @property integer $iid
 */
class TodoItems extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'todo_items';
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['todo_list_id'], 'required'],
            [['todo_list_id'], 'integer'],
            [['created_at', 'updated_at', 'completed_at'], 'safe'],
            [['content'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'todo_list_id' => 'Todo List ID',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'completed_at' => 'Completed At',
            'iid' => 'Iid',
        ];
    }
}
