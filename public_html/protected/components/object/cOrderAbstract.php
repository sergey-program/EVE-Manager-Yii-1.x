<?php

abstract class cOrderAbstract
{
    protected $oOrder;

    /**
     * @param MarketOrder $oOrder
     */
    public function __construct(MarketOrder $oOrder)
    {
        $this->oOrder = $oOrder;
    }
}