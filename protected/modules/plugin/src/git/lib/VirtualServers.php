<?php

/**
 * This is the model class for table "{{virtual_servers}}".
 *
 * The followings are the available columns in table '{{virtual_servers}}':
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $htdocs_path
 * @property string $nginx_config_path
 * @property string $ngixn_bin
 * @property string $ip
 * @property integer $ssh_port
 * @property integer $url_port
 * @property string $url_host
 * @property string $url_schema
 */
class VirtualServers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{virtual_servers}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, htdocs_path, nginx_config_path, ngixn_bin, ip, ipper, ssh_port, url_port, url_host, url_schema', 'required'),
			array('ssh_port, url_port', 'numerical', 'integerOnly'=>true),
			array('name, url_schema', 'length', 'max'=>45),
			array('htdocs_path, nginx_config_path', 'length', 'max'=>3841),
			array('ngixn_bin', 'length', 'max'=>4096),
			array('ip', 'length', 'max'=> 11),
			array('url_host', 'length', 'max'=>256),
			array('ipper', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, htdocs_path, nginx_config_path, ngixn_bin, ip, ssh_port, url_port, url_host, url_schema', 'safe', 'on'=>'search'),
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
			'name' => '名称',
			'description' => '描述',
			'htdocs_path' => 'Htdocs根目录',
			'nginx_config_path' => 'Nginx配置目录',
			'ngixn_bin' => 'Nginx命令',
			'ip' => 'Ip',
			'ipper' => 'Ip',
			'ssh_port' => 'Ssh端口',
			'url_port' => 'HTTP(s)端口',
			'url_host' => 'HTTP(s)域名',
			'url_schema' => 'HTTP/HTTPS',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('htdocs_path',$this->htdocs_path,true);
		$criteria->compare('nginx_config_path',$this->nginx_config_path,true);
		$criteria->compare('ngixn_bin',$this->ngixn_bin,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('ssh_port',$this->ssh_port);
		$criteria->compare('url_port',$this->url_port);
		$criteria->compare('url_host',$this->url_host,true);
		$criteria->compare('url_schema',$this->url_schema,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VirtualServers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getIpper()
	{
		return long2ip($this->ip);
	}

	public function setIpper($value='')
	{
		$this->ip = ip2long($value);
		return $this->ip;
	}
}
