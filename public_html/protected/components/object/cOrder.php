<?php

class cOrder extends cOrderAbstract
{
    /**
     * @return string
     */
    public function getStationID()
    {
        return $this->oOrder->stationID;
    }

}