<?php

class ApiCharacter extends AbstractModel
{
    public $id;
    public $apiID;
    public $characterID;
    public $characterName;
    public $corporationID;
    public $corporationName;
    public $allianceID;
    public $allianceName;
    public $factionID;
    public $factionName;

    /**
     * @param string $sClass
     *
     * @return CActiveRecord
     */
    public static function model($sClass = __CLASS__)
    {
        return parent::model($sClass);
    }

    /**
     * @return string
     */
    public function tableName()
    {
        return '_api_character';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return array(
            // create
            array('apiID, characterID, characterName, corporationID, corporationName, allianceID, allianceName', 'required', 'on' => 'create'),
            array('factionID, factionName', 'safe', 'on' => 'create')
        );
    }

    /**
     * @return array
     */
    public function relations()
    {
        return array(
            'oApi' => array(self::BELONGS_TO, 'Api', 'apiID')
        );
    }
}