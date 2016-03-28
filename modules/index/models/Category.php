<?php

namespace app\modules\index\models;

use Yii;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $title
 * @property integer $parent_id
 *
 * @property Post[] $posts
 * @property Category $parent
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
            [['title'], 'string', 'max' => 255],
            [['parent_id'], 'integer'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent_id' => 'id']],
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
            'parent_id' => 'Parent',
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
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    /**
     * All Category
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getAllCategories()
    {
        return $this->find()->select(['id', 'title', 'parent_id'])->with('posts')->orderBy('title')->all();
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getNotParentCategories()
    {

        return $this->find()->select(['id', 'title', 'parent_id'])->where(['parent_id' => null])->with('posts')->orderBy('title')->all();

    }

    /**
     * @param $parentId
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getChildCategories($parentId)
    {

        return $this->find()->select(['id', 'title', 'parent_id'])->where(['parent_id' => $parentId])->all();
        /*if (empty($cat)) {
            return false;
        } else {
            return $cat;
        }*/
    }

    /**
     *
     */
    public function viewCategories()
    {
        echo '<ul>';
        foreach ($this->getNotParentCategories() as $parentCat) {
            echo '<li>' . Html::a($parentCat->title, ['default/category', 'id' => $parentCat->id]) . '</li>';
            $this->viewTree($parentCat->id);
        }
        echo '</ul>';
    }

    /**
     * @param $idParent
     */
    public function viewTree($idParent)
    {
        echo '<ul>';
        foreach ($this->getChildCategories($idParent) as $p) {
            echo '<li>' . Html::a($p->title, ['default/category', 'id' => $p->id]) . '</li>';
            $this->viewTree($p->id);
        }
        echo '</ul>';
    }


    /**
     * @param $id
     * @return Post[]|null
     */
    public function getPostsFromCategory($id)
    {
        return $this->find()->select(['id', 'title'])->with('posts')->where(['id' => $id])->one();
    }

    /**
     * @param $id
     * @return mixed|null
     */
    public function getName($id)
    {
        return $this->find()->select(['id', 'title'])->where(['id' => $id])->one()->title;
    }

}
