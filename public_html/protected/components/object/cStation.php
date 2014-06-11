<?php

class cStation extends cStationAbstract
{
    /**
     * @return string|int
     */
    public function getTypeID()
    {
        return $this->oStation->stationTypeID;
    }

    /**
     * @return string|null
     */
    public function getStationID()
    {
        return $this->sStationID;
    }

    /**
     * @return string
     */
    public function getStationName()
    {
        return $this->oStation->stationName;
    }

    /**
     * @return int
     */
    public function getOrdersCount()
    {
        return count($this->aOrder);
    }
}