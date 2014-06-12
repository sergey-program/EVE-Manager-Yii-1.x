<?php

class cStation extends cStationAbstract
{
    /**
     * @return string|int
     */
    public function getTypeID()
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
     * @return int
     */
    public function getOrdersCount()
    {
        return count($this->aOrder);
    }

    /**
     * @return int
     */
    public function getDemandsCount()
    {
        return count($this->aDemand);
    }
}