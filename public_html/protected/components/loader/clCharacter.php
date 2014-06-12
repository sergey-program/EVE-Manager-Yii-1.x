<?php

class clCharacter
{
    private $sCharacterID;

    public function __construct()
    {
    }

    /**
     * @param string|int $sCharacterID
     *
     * @return $this
     */
    public function setCharacterID($sCharacterID)
    {
        $this->sCharacterID = $sCharacterID;

        return $this;
    }

    /**
     * @return array|CActiveRecord|mixed|null
     */
    public function load()
    {
        if ($this->sCharacterID) {
            return ApiCharacter::model()->findByAttributes(array('characterID' => $this->sCharacterID));
        }

        return null;
    }

    /**
     *
     */
    public static function loadAll()
    {
        $aCharacter = array();

        foreach (ApiCharacter::model()->findAll() as $oCharacter) {
            $aCharacter[] = new cCharacter($oCharacter);
        }

        return $aCharacter;
    }
}