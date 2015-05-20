<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property string $name
 * @property string $last_name
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $creation_time
 * @property integer $group
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property GroupTypes $group0
 */
class User extends CActiveRecord
{
    public $password_repeat;
    public $email_repeat;


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, username,name,password', 'required'),
            array('email_repeat','compare','compareAttribute'=>'email','message'=>Yii::t('user','Email not Match')),//Not in BD
			array('group, active', 'numerical', 'integerOnly'=>true),
			array('name, last_name, email, username', 'length', 'max'=>45),
			array('password','length', 'max'=>255),
            array('password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>Yii::t('user', 'Password not Match')),//Not in BD
			array('creation_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, name, last_name, email, username, password, creation_time, group, active', 'safe', 'on'=>'search'),
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
			'group0' => array(self::BELONGS_TO, 'GroupTypes', 'group'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'name' => 'Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
            'email_repeat'=>Yii::t('user','Repeat Email'),
			'username' => 'Username',
			'password' => 'Password',
            'password_repeat'=>Yii::t('user', 'Repeat Password'),
			'creation_time' => 'Creation Time',
			'group' => 'Group',
			'active' => 'Active',

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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('creation_time',$this->creation_time,true);
		$criteria->compare('group',$this->group);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
