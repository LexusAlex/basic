<?php

namespace app\modules\index\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $anons
 * @property string $content
 * @property integer $status
 * @property string $slug
 * @property string $created_at
 * @property string $updated_at
 */
class Post extends ActiveRecord
{

    const STATUS_PUBLISH = 1;

    const STATUS_DRAFT = 0;

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                /*'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],*/
                // если вместо метки времени UNIX используется datetime:
                // 'value' => new Expression('NOW()'),
            ],
            'slug' => [
                'class' => 'Zelenin\yii\behaviors\Slug',
                'slugAttribute' => 'slug',
                'attribute' => 'title',
                // optional params
                'ensureUnique' => true,
                'replacement' => '-',
                'lowercase' => true,
                'immutable' => false,
                // If intl extension is enabled, see http://userguide.icu-project.org/transforms/general.
                'transliterateOptions' => 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;'
            ]
        ];
    }

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['title', 'anons', 'content', 'status'], 'required'],
            [['anons', 'content', 'slug'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            ['title', 'duplicateTitle'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'anons' => 'Anons',
            'content' => 'Content',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function duplicateTitle($a)
    {
        $record = $this::find()->where('title =:name', [':name' => $this->title])->one();
        if ($record !== null) {
            if (Yii::$app->controller->action->id == 'create') {
                $errorMsg = 'Имя уже используется';
                $this->addError($a, $errorMsg);
            }

        }

        /*if(strlen($this->password)<=8) {
            $errorMsg= 'Password must be at least 8 symbols length';
            $this->addError('password',$errorMsg);
        }*/
    }
}