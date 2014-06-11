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
}