<?php

/**
 * This is the model class for table "questions".
 *
 * The followings are the available columns in table 'questions':
 * @property string $id
 * @property string $question
 * @property string $answer
 * @property string $priority
 * @property integer $status
 * @property string $views
 *
 * The followings are the available model relations:
 * @property QuestToRelation[] $rel
 * @property QuestToRelation[] $quest
 */
class Questions extends CActiveRecord {

    /**
     * Массив для связанных вопросов
     * @var array 
     */
    public $related = array();

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Questions the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'questions';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('question', 'required'),
            array('status', 'numerical', 'integerOnly' => true),
            array('question', 'length', 'max' => 250),
            array('priority, views', 'length', 'max' => 11),
            array('answer,related', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, question, answer, priority, status, views, related', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'rel' => array(self::HAS_MANY, 'QuestToRelation', 'id_rel'),
            'quest' => array(self::HAS_MANY, 'QuestToRelation', 'id_quest'),
        );
    }
    
    public function defaultScope()
    {
        return array(
            'order'=>'priority DESC',
        );
    }

    public function scopes()
    {
        return array(
            'published'=>array(
                'condition'=>'status=1',
            ),
        );
    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'question' => 'Вопрос',
            'answer' => 'Ответ',
            'related'=>'Связанные вопросы',
            'priority' => 'Приоритет',
            'status' => 'Статус',
            'views' => 'Просмотров',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('question', $this->question, true);
        $criteria->compare('answer', $this->answer, true);
        $criteria->compare('priority', $this->priority, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('views', $this->views, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    protected function afterSave() {
        parent::afterSave();

        if($this->isNewRecord)
        {
            $errors=array();
            foreach ($this->related as $rel) {
                $questRel = new QuestToRelation();
                $questRel->id_quest=$this->id;
                $questRel->id_rel=$rel;
                if(!$questRel->save())
                {
                   $errors[]=$questRel->getErrors();
                }
            }
            if($errors)
            {
                echo CVarDumper::dump($errors,10,TRUE);
                                exit();
            }
        }
        else
        {
            $criteria = new CDbCriteria();
            $criteria->compare('id_quest', $this->id);
            QuestToRelation::model()->deleteAll($criteria);
           
            $errors=array();
            foreach ($this->related as $rel) {
                $questRel = new QuestToRelation();
                $questRel->id_quest=$this->id;
                $questRel->id_rel=$rel;
                if(!$questRel->save())
                {
                   $errors[]=$questRel->getErrors();
                }
            }
            if($errors)
            {
                echo CVarDumper::dump($errors,10,TRUE);
                                exit();
            }
        }
        
    }

}
