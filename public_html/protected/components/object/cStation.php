<?php

class cStation extends cStationAbstract
{
    /**
     * @return string|null
     */
    public function getStationID()
    {
        return $this->sStationID;
    }

    /**
     * @return int
     */
    public function getOrdersCount()
    {
        return count($this->aOrder);
    }
}