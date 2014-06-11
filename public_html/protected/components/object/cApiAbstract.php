<?php

abstract class cApiAbstract
{
    protected $oApi;
    protected $oInfo;
    protected $aCharacter = array();

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
        $this
            ->loadCharacters()
            ->loadInfo();

        return $this;
    }

    /**
     * Assign characters;
     *
     * @return $this
     */
    protected function loadCharacters()
    {
        if ($this->oApi->aCharacter) {
            foreach ($this->oApi->aCharacter as $oCharacter) {
                $this->aCharacter[] = new cCharacter($oCharacter);
            }
        }

        return $this;
    }

    /**
     * Assign api info;
     *
     * @return $this
     */
    protected function loadInfo()
    {
        if ($this->oApi->oInfo) {
            $this->oInfo = $this->oApi->oInfo;
        }

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
     * @return bool
     */
    public function hasInfo()
    {
        return !empty($this->oInfo);
    }

    /**
     * @return bool
     */
    public function isUpdated()
    {
        return true;
    }
}