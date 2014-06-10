<?php

class cApi
{
    private $oApi;
    private $aCharacter = array();

    /**
     * Can assign model on create;
     *
     * @param Api $oApi
     */
    public function __construct(Api $oApi = null)
    {
        if (!is_null($oApi)) {
            $this->setModel($oApi);
        }
    }

    private function assignCharacters()
    {
        foreach ($this->oApi->aCharacter as $oCharacter) {
            $this->aCharacter[] = new cCharacter($oCharacter);
        }
    }

    /**
     * Custom set model;
     *
     * @param Api $oApi
     *
     * @return $this
     */
    public function setModel(Api $oApi)
    {
        $this->oApi = $oApi;
        $this->assignCharacters();

        return $this;
    }

    /**
     * @return bool
     */
    public function hasCharacters()
    {
        return !empty($this->aCharacter);
    }

    /**
     * @return array
     */
    public function getCharacters()
    {
        return $this->aCharacter;
    }

    /**
     * @return bool
     */
    public function isUpdated()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getID()
    {
        return $this->oApi->id;
    }

    /**
     * @return string|int
     */
    public function getKeyID()
    {
        return $this->oApi->keyID;
    }

    /**
     * @return string
     */
    public function getVCode()
    {
        return $this->oApi->vCode;
    }
}