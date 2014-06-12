<?php

class cCharacter extends cCharacterAbstract
{
    /**
     * @return string|int
     */
    public function getCharacterID()
    {
        return $this->oModel->characterID;
    }

    /**
     * @return string
     */
    public function getCharacterName()
    {
        return $this->oModel->characterName;
    }

    /**
     * @return string|int
     */
    public function getCorporationID()
    {
        return $this->oModel->corporationID;
    }

    /**
     * @return string
     */
    public function getCorporationName()
    {
        return $this->oModel->corporationName;
    }

    /**
     * @return string|int|null
     */
    public function getAllianceID()
    {
        return $this->oModel->allianceID;
    }

    /**
     * @return string|null
     */
    public function getAllianceName()
    {
        return $this->oModel->allianceName;
    }

    /**
     * @return string|int|null
     */
    public function getFactionID()
    {
        return $this->oModel->factionID;
    }

    /**
     * @return string|null
     */
    public function getFactionName()
    {
        return $this->oModel->factionName;
    }

    /**
     * List of orders;
     *
     * @param string|int|null $sStationID Filter for station;
     *
     * @return array
     */
    public function getOrders($sStationID = null)
    {
        $clOrder = new clOrder();
        $clOrder
            ->setCharacterID($this->getCharacterID())
            ->setStationID($sStationID)
            ->setResultAs(clOrder::AS_LIST);

        return $clOrder->load();
    }

    /**
     * List of demands;
     *
     * @param string|int|null $sStationID Filter for station;
     *
     * @return array
     */
    public function getDemands($sStationID = null)
    {
        $clDemand = new clDemand();
        $clDemand
            ->setCharacterID($this->getCharacterID())
            ->setStationID($sStationID)
            ->setResultAs(clDemand::AS_LIST);

        return $clDemand->load();
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


    /**
     * @param string|int|null $sStationID
     *
     * @return string|int
     */
    public function getDemandsCount($sStationID = null)
    {
        $aAttributes = array('characterID' => $this->getCharacterID());

        if ($sStationID) {
            $aAttributes['stationID'] = $sStationID;
        }

        return MarketDemand::model()->countByAttributes($aAttributes);
    }

    /**
     * List of stations where character has orders;
     *
     * @return array
     */
    public function getOrdersAsStationList()
    {
        $clOrder = new clOrder();
        $clOrder
            ->setCharacterID($this->getCharacterID())
            ->setResultAs(clOrder::AS_STATION);

        return $clOrder->load();
    }

    /**
     * List of stations where character has demands;
     *
     * @return array
     */
    public function getDemandsAsStationList()
    {
        $clDemand = new clDemand();
        $clDemand
            ->setCharacterID($this->getCharacterID())
            ->setResultAs(clDemand::AS_STATION);

        return $clDemand->load();
    }
}