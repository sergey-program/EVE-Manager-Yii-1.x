<?php

class cLoaderOrder
{
    private $sCharacterID;

    /**
     * @param string|int $sCharacterID
     */
    public function setCharacterID($sCharacterID)
    {
        $this->sCharacterID = $sCharacterID;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $aOrder = array();

        foreach (MarketOrder::model()->findAll() as $oOrder) {
            $aOrder[] = $oOrder;
        }

        return $oOrder;
    }
}