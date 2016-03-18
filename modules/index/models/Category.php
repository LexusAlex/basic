<?php

namespace app\modules\index\models;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Post[] $posts
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
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
            'title' => 'Title',
        ];
    }

    /**
     * $c = Category::findOne([1]);
     * $r = $c->getPosts()->where(['id'=>3])->all();
     * $c->posts;
     * $r
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['category_id' => 'id']);
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getAllCategories()
    {
        return $this->find()->select(['id', 'title'])->orderBy('title')->all();
    }

    /**
     * @param $id
     * @return Post[]|null
     */
    public function getPostsFromCategory($id)
    {
        if ($this->find()->where(['id' => $id])->one() === null) {
            return null;
        } else {
            return $this->findOne([$id])->posts;
        }
    }

    /**
     * @param $id
     * @return mixed|null
     */
    public function getName($id)
    {
        if ($this->find()->where(['id' => $id])->one() === null) {
            return null;
        }
        return $this->find()->where(['id' => $id])->one()->title;
    }

}
