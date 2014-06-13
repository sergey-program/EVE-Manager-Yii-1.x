<?php

class cStation extends cObjectAbstract implements cObjectInterface
{
    /**
     * @param StaStation|ApiCommonConquerableStationList $oModel
     *
     * @return $this
     */
    public function setModel($oModel)
    {
        if ($oModel instanceof StaStation || $oModel instanceof ApiCommonConquerableStationList) {
            $this->oModel = $oModel;
        }

        return $this;
    }

    /**
     * @param string|int $sStationID
     *
     * @return $this
     */
    public function loadModel($sStationID)
    {
        $this->setModel(clStation::loadOne($sStationID, false));

        return $this;
    }

    /**
     * @return string|int
     */
    public function getStationTypeID()
    {
        return $this->oModel->stationTypeID;
    }

    /**
     * @return string|null
     */
    public function getStationID()
    {
        return $this->oModel->stationID;
    }

    /**
     * @return string
     */
    public function getStationName()
    {
        return $this->oModel->stationName;
    }

    /**
     * Return orders that station own;
     *
     * @param string $sCharacterID
     *
     * @return array
     */
    public function getOrders($sCharacterID)
    {
        return clOrder::loadAllAsList($sCharacterID, $this->getStationID());
    }

    /**
     * Return count of orders at this station;
     *
     * @param string|int $sCharacterID
     *
     * @return int
     */
    public function getOrdersCount($sCharacterID)
    {
        $aAttr = array('characterID' => $sCharacterID, 'stationID' => $this->getStationID());

        return ApiCharacterMarketOrders::model()->countByAttributes($aAttr);
    }

    /**
     * @param string|int $sCharacterID
     *
     * @return int
     */
    public function getDemandsCount($sCharacterID)
    {
        $aAttr = array('characterID' => $sCharacterID, 'stationID' => $this->getStationID());

        return MarketDemand::model()->countByAttributes($aAttr);
    }
}