<?php

class MarketLocation extends AbstractModel
{
    public $id;
    public $characterID;
    public $stationID;

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
        return '{{market_location}}';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return array(
            array('characterID, stationID', 'required', 'on' => 'create')
        );
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return array();
    }

    /**
     * @return array
     */
    public function relations()
    {
        return array();
    }
}