<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property integer $id
 * @property string $name
 * @property string $app_id
 * @property string $secret_key
 * @property string $cert_sandbox
 * @property string $cert_production
 * @property string $mode
 */
class Project extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, mode', 'required'),
			array('name', 'length', 'max'=>255),
			array('mode', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, mode', 'safe', 'on'=>'search'),
			array('cert_sandbox, cert_production', 'file', 'types'=>'pem'),
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
			'name' => 'Name',
			'app_id' => 'App ID',
			'secret_key' => 'Secret Key',
			'cert_sandbox' => '.pem file for Sandbox',
			'cert_production' => '.pem file for Production',
			'mode' => 'Mode',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('app_id',$this->app_id,true);
		$criteria->compare('secret_key',$this->secret_key,true);
		$criteria->compare('cert_sandbox',$this->cert_sandbox,true);
		$criteria->compare('cert_production',$this->cert_production,true);
		$criteria->compare('mode',$this->mode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function generateAppID() 
	{
		$now = md5(md5(mktime().mt_rand()));
		return substr($now, -10, 10);
	}

	public function generateSecretKey() 
	{
		$now = md5(md5(mktime().mt_rand()));
		return substr($now, -10, 10);		
	}

    public function behaviors() 
    {
    	return array(
	    	'timestamps' => array(
	    		'class' => 'zii.behaviors.CTimestampBehavior',
	    		'createAttribute' => 'created_at',
	    		'updateAttribute' => 'modified_at',
	    		'setUpdateOnCreate' => true,
	    	),
    	);
    }

	public function getModeOptions()
    {
        return array(
            'SANDBOX' => 'Sandbox',
            'PRODUCTION' => 'Production',
        );
    }

    protected function beforeValidate()
    {
    	if ($this->getIsNewRecord()) {
    		$this->app_id = $this->generateAppID();
    		$this->secret_key = $this->generateSecretKey();
    	}

    	return true;
    }

    public function retrieveProjectId($app_id, $secret_key)
    {
    	$theProject = $this->findBySql("select id from project where app_id = '$app_id' and secret_key = '$secret_key'");
    	return $theProject->id;
    }

}