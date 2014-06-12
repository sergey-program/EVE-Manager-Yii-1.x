<?php

class cDemand extends cDemandAbstract
{
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