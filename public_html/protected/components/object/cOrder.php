<?php

class cOrder extends cOrderAbstract
{
    /**
     * @return string|int
     */
    public function getOrderID()
    {
        return $this->oOrder->orderID;
    }

    /**
     * @return string|int
     */
    public function getTypeID()
    {
        return $this->oOrder->typeID;
    }

    /**
     * @return string
     */
    public function getTypeName()
    {
        return $this->oOrder->oInvTypes->typeName;
    }

    /**
     * @return string
     */
    public function getStationID()
    {
        return $this->oOrder->stationID;
    }

}