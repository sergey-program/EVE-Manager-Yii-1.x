<?php

class MarketOrder extends AbstractModel
{
    public $id;
    public $characterID;
    public $orderID;
    public $stationID;
    public $volEntered;
    public $volRemaining;
    public $minVolume;
    public $orderState;
    public $typeID;
    public $range;
    public $accountKey;
    public $duration;
    public $escrow;
    public $price;
    public $bid;
    public $issued;

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
        return '_market_order';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return array(
            array('characterID, orderID, stationID, volEntered, volRemaining, minVolume, orderState, typeID, range, accountKey, duration, escrow, price, bid, issued', 'required', 'on' => 'create')
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
