<?php

class cDemand extends cObjectAbstract implements cObjectInterface
{
    /**
     * @param MarketDemand $oModel
     *
     * @return $this
     */
    public function setModel($oModel)
    {
        if ($oModel instanceof MarketDemand ) {
            $this->oModel = $oModel;
        }

        return $this;
    }

    /**
     * @param string|int $sID
     *
     * @return $this
     */
    public function loadModel($sID)
    {
        $this->setModel(clDemand::loadOne($sID, false));

        return $this;
    }

    /**
     * @return string|int
     */
    public function getID()
    {
        return $this->oModel->id;
    }

    /**
     * @return string|int
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
        return 'unknown';
    }

    /**
     * @return string|int
     */
    public function getTypeID()
    {
        return $this->oModel->typeID;
    }

    /**
     * @return string
     */
    public function getTypeName()
    {
        return 'not working';
    }

    /**
     * @return string|int
     */
    public function getQuantity()
    {
        return $this->oModel->quantity;
    }

}