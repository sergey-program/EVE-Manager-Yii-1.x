<?php

class cLoaderOrder
{
    const AS_STATION = 'as_station';
    const AS_LIST = 'as_list';

    private $sCharacterID;

    /**
     * @param string|int|null $sCharacterID
     */
    public function __construct($sCharacterID = null)
    {
        if (!is_null($sCharacterID)) {
            $this->sCharacterID = $sCharacterID;
        }
    }

    /**
     * @param string|int $sCharacterID
     */
    public function setCharacterID($sCharacterID)
    {
        $this->sCharacterID = $sCharacterID;
    }

    /**
     * @param string $sAs
     *
     * @return array (cOrder|cStation)
     */
    public function getAll($sAs = self::AS_LIST)
    {
        $aOrder = array();
        $aStation = array();

        foreach (MarketOrder::model()->findAllByAttributes(array('characterID' => $this->sCharacterID, 'orderState' => 0)) as $oOrder) {
            $cOrder = new cOrder($oOrder);

            if ($sAs == self::AS_STATION) {
                if (!isset($aStation[$cOrder->getStationID()])) {
                    $aStation[$cOrder->getStationID()] = new cStation($cOrder->getStationID());
                }

                $aStation[$cOrder->getStationID()]->addOrder($cOrder);
            }

            $aOrder[] = $cOrder;
        }

        return ($sAs == self::AS_STATION) ? $aStation : $aOrder;
    }
}