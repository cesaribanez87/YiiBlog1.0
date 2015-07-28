<?php

/**
 * This is the model class for table "tags".
 *
 * The followings are the available columns in table 'tags':
 * @property integer $id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property postTags[] $postTags
 */
class Tags extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tags';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'posts1'=>array(self::MANY_MANY, 'Post', 'post_tags(tag_id,post_id)'),
			'postTags' => array(self::HAS_MANY, 'PostTags', 'tag_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tags the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**Save Tags
     * @param $tags
     * @param $postID
     */
    public function saveTags($tags,$postID){
        $arrayTags=$this->formatTags($tags);
        if(!empty($arrayTags)){
            $tagIds=array();
            foreach($arrayTags as $t){
                if(!empty($t)){
                    $retrieveTag=Tags::model()->findByAttributes(array('name'=>trim($t)));
                    if(empty($retrieveTag)){
                        $model=new Tags();
                        $model->name=trim($t);
                        $model->save();
                        if(!in_array($model->id,$tagIds)){
                            $tagIds[]=$model->id;
                        }
                    }else{
                        if(!in_array($retrieveTag->id,$tagIds)){
                            $tagIds[]=$retrieveTag->id;
                        }
                    }
                }
            }
        }
        if(!empty($tagIds)){
            $this->savePostRelations($tagIds,$postID);
        }
    }

    public function formatTags($tags){
        return explode(',',$tags);
    }

    /**Save relation Post-Tags
     * @param $tagIds
     * @param $postID
     */
    public function savePostRelations($tagIds,$postID){
        $recordsToInsert=array();
        $formatIds=implode(',',$tagIds);
        $command=Yii::app()->db->createCommand(
            'SELECT DISTINCT(tag_id)
             FROM post_tags
             WHERE tag_id IN ('.$formatIds.') AND post_id=:postID;'
        );
        $command->bindParam(':postID',$postID);
        $query=$command->queryAll();
        if(!empty($query)){
            $queryResults=array();
            foreach($query as $q){
                $queryResults[]=$q['tag_id'];
            }
            foreach($tagIds as $t){
                if(!in_array($t,$queryResults)){
                    $recordsToInsert[]=array('tag_id'=>$t,'post_id'=>$postID);
                }
            }
        }else{
            foreach($tagIds as $t){
                $recordsToInsert[]=array('tag_id'=>$t,'post_id'=>$postID);
            }
        }
        if(!empty($recordsToInsert)){
            $builder=Yii::app()->db->schema->commandBuilder;
            $command=$builder->createMultipleInsertCommand('post_tags',$recordsToInsert);
            $command->execute();
        }
    }

    /**Retrieve the tags per post
     * @param $postID
     * @return null
     */
    public static function retrieveTags($postID){
        $command=Yii::app()->db->createCommand(
            'SELECT p.tag_id,t.name,p.post_id
             FROM post_tags p
             JOIN tags t ON t.id=p.tag_id
             WHERE p.post_id=:postID;'
        );
        $command->bindParam(':postID',$postID);
        $query=$command->queryAll();
        if(!empty($query)){
            return $query;
        }else{
            return null;
        }
    }

    /**Unused
     * @return mixed
     */
    public static function retrieveAllTags(){
        $tags=Tags::model()->findAll();
        return $tags;
    }
}
