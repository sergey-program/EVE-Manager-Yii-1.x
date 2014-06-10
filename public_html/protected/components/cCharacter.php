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

    public function getCorporationID()
    {
        return $this->oCharacter->corporationID;
    }

    public function getCorporationName()
    {
        return $this->oCharacter->corporationName;
    }

    public function getAllianceID()
    {
        return $this->oCharacter->allianceID;
    }

    public function getAllianceName()
    {
        return $this->oCharacter->allianceName;
    }

    public function getFactionID()
    {
        return $this->oCharacter->factionID;
    }

    public function getFactionName()
    {
        return $this->oCharacter->factionName;
    }
}