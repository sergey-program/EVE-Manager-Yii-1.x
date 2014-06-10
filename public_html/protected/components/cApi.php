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

        return $this;
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
    public function hasCharacters()
    {
        return empty($this->aCharacter);
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