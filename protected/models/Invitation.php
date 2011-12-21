<?php

/**
 * This is the model class for table "invitation".
 *
 * The followings are the available columns in table 'invitation':
 * @property integer $id
 * @property string $username
 * @property integer $email
 * @property string $sent
 */
class Invitation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Invitation the static model class
	 */
public $files;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'invitation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                         array('username, email','required'),
                    array('username','unique','message'=>'Name {value} already in use!'),
                    array('email','unique','message'=>'Email {value} already in use!'),
                         array('sent', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, email, sent', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'email' => 'Email',
			'sent' => 'Sent',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email);
		$criteria->compare('sent',$this->sent,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}