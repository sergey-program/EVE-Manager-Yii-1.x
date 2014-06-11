<?php

class cLoaderCharacter
{
    /**
     *
     */
    public static function all()
    {
        $aCharacter = array();

        foreach (ApiCharacter::model()->findAll() as $oCharacter) {
            $aCharacter[] = new cCharacter($oCharacter);
        }

        return $aCharacter;
    }

    /**
     * @param string|int $sCharacterID
     *
     * @return cCharacter
     */
    public static function byCharacterID($sCharacterID)
    {
        $oCharacter = ApiCharacter::model()->findByAttributes(array('characterID' => $sCharacterID));

        return new cCharacter($oCharacter);
    }
}