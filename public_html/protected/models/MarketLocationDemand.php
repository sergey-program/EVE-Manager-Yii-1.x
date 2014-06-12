<?php

class MarketDemand extends AbstractModel
{
    public $id;
    public $characterID;
    public $stationID;
    public $typeID;
    public $quantity;

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
        return '{{market_location_demand}}';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return array();
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