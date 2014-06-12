<?php

class cCharacter extends cCharacterAbstract
{
    /**
     * @return string|int
     */
    public function getCharacterID()
    {
        return $this->oCharacter->characterID;
    }

    /**
     * @return string
     */
    public function getCharacterName()
    {
        return $this->oCharacter->characterName;
    }

    /**
     * @return string|int
     */
    public function getCorporationID()
    {
        return $this->oCharacter->corporationID;
    }

    /**
     * @return string
     */
    public function getCorporationName()
    {
        return $this->oCharacter->corporationName;
    }

    /**
     * @return string|int|null
     */
    public function getAllianceID()
    {
        return $this->oCharacter->allianceID;
    }

    /**
     * @return string|null
     */
    public function getAllianceName()
    {
        return $this->oCharacter->allianceName;
    }

    /**
     * @return string|int|null
     */
    public function getFactionID()
    {
        return $this->oCharacter->factionID;
    }

    /**
     * @return string|null
     */
    public function getFactionName()
    {
        return $this->oCharacter->factionName;
    }

    /**
     * @param string          $sType      Return type can be cLoaderOrder::AS_LIST or cLoaderOrder::AS_STATION.
     * @param string|int|null $sStationID Filter for station.
     *
     * @return array
     */
    public function getOrders($sType, $sStationID = null)
    {
        $cLoaderOrder = new cLoaderOrder();
        $cLoaderOrder
            ->setCharacterID($this->getCharacterID())
            ->setStationID($sStationID)
            ->setResultAs($sType);

        return $cLoaderOrder->getAll();
    }

    /**
     * @param string|int|null $sStationID
     *
     * @return string|int
     */
    public function getOrdersCount($sStationID = null)
    {
        $aAttributes = array('characterID' => $this->getCharacterID(), 'orderState' => 0);

        if ($sStationID) {
            $aAttributes['stationID'] = $sStationID;
        }

        return MarketOrder::model()->countByAttributes($aAttributes);
    }
}