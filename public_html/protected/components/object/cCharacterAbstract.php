<?php

abstract class cCharacterAbstract
{
    protected $oCharacter;

    /**
     * @param ApiCharacter $oCharacter
     */
    public function __construct(ApiCharacter $oCharacter = null)
    {
        if (!is_null($oCharacter)) {
            $this->setModel($oCharacter);
        }
    }

    /**
     * @param ApiCharacter $oCharacter
     *
     * @return $this
     */
    public function setModel(ApiCharacter $oCharacter)
    {
        $this->oCharacter = $oCharacter;

        return $this;
    }
}