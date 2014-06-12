<?php

class clOrder
{
    const AS_STATION = 'as_station';
    const AS_LIST = 'as_list';

    private $sCharacterID;
    private $sStationID;
    private $sResultAs;

    /**
     * @param string|int|null $sCharacterID
     * @param string|int|null $sStationID
     * @param string|null     $sResultAs
     */
    public function __construct($sCharacterID = null, $sStationID = null, $sResultAs = self::AS_LIST)
    {
        $this
            ->setCharacterID($sCharacterID)
            ->setStationID($sStationID)
            ->setResultAs($sResultAs);
    }

    /**
     * @param string|int $sCharacterID
     *
     * @return $this
     */
    public function setCharacterID($sCharacterID)
    {
        $this->sCharacterID = $sCharacterID;

        return $this;
    }

    /**
     * @param string|int $sStationID
     *
     * @return $this
     */
    public function setStationID($sStationID)
    {
        $this->sStationID = $sStationID;

        return $this;
    }

    /**
     * @param string $sResultAs
     *
     * @return $this
     */
    public function setResultAs($sResultAs)
    {
        $this->sResultAs = $sResultAs;

        return $this;
    }

    /**
     * @return array (cOrder|cStation)
     */
    public function load()
    {
        $aResult = array();
        $aAttributes = array('characterID' => $this->sCharacterID, 'orderState' => MarketOrder::ORDER_STATE_OPEN);

        if ($this->sStationID) {
            $aAttributes['stationID'] = $this->sStationID;
        }

        $aOrder = MarketOrder::model()->findAllByAttributes($aAttributes);

        foreach ($aOrder as $oOrder) {
            $cOrder = new cOrder($oOrder);

            if ($this->sResultAs === self::AS_STATION) {
                if (!isset($aResult[$cOrder->getStationID()])) {
                    $aResult[$cOrder->getStationID()] = new cStation($cOrder->getStationID());
                }

                $aResult[$cOrder->getStationID()]->addOrder($cOrder);
            } elseif ($this->sResultAs === self::AS_LIST) {
                $aResult[] = $cOrder;
            }
        }

        return $aResult;
    }
}