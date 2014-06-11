<?php

class cCharacter extends cCharacterAbstract
{
    /**
     * @return string|int
     */
    public function getCharacterID()
    {
        return $this->oCharacter->characterID;
    }

    /**
     * @return string
     */
    public function getCharacterName()
    {
        return $this->oCharacter->characterName;
    }

    /**
     * @return string|int
     */
    public function getCorporationID()
    {
        return $this->oCharacter->corporationID;
    }

    /**
     * @return string
     */
    public function getCorporationName()
    {
        return $this->oCharacter->corporationName;
    }

    /**
     * @return string|int|null
     */
    public function getAllianceID()
    {
        return $this->oCharacter->allianceID;
    }

    /**
     * @return string|null
     */
    public function getAllianceName()
    {
        return $this->oCharacter->allianceName;
    }

    /**
     * @return string|int|null
     */
    public function getFactionID()
    {
        return $this->oCharacter->factionID;
    }

    /**
     * @return string|null
     */
    public function getFactionName()
    {
        return $this->oCharacter->factionName;
    }

    /**
     * @return array
     */
    public function getOrders()
    {
        $aOrder = array();

        return $aOrder;
    }

    /**
     * @return string|int
     */
    public function getOrdersCount()
    {
        return MarketOrder::model()->countByAttributes(array('characterID' => $this->getCharacterID(), 'orderState' => 0));
    }
}