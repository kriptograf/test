<?php

/**
 * This is the model class for table "quest_to_relation".
 *
 * The followings are the available columns in table 'quest_to_relation':
 * @property string $id
 * @property string $id_quest
 * @property string $id_rel
 *
 * The followings are the available model relations:
 * @property Questions $idRel
 * @property Questions $idQuest
 */
class QuestToRelation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return QuestToRelation the static model class
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
		return 'quest_to_relation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_quest, id_rel', 'required'),
			array('id_quest, id_rel', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_quest, id_rel', 'safe', 'on'=>'search'),
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
			'idRel' => array(self::BELONGS_TO, 'Questions', 'id_rel'),
			'idQuest' => array(self::BELONGS_TO, 'Questions', 'id_quest'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_quest' => 'Id Quest',
			'id_rel' => 'Id Rel',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_quest',$this->id_quest,true);
		$criteria->compare('id_rel',$this->id_rel,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}