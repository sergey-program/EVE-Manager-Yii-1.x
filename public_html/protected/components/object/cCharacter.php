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


    public function getOrdersAsList()
    {
        $cLoaderOrder = new cLoaderOrder($this->getCharacterID());

        return $cLoaderOrder->getAll(cLoaderOrder::AS_LIST);
    }

    /**
     * @return array
     */
    public function getOrdersAsStation()
    {
        $cLoaderOrder = new cLoaderOrder($this->getCharacterID());

        return $cLoaderOrder->getAll(cLoaderOrder::AS_STATION);
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