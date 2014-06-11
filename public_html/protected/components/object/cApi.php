<?php

class cApi extends cApiAbstract
{
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

    /**
     * @return array
     */
    public function getCharacters()
    {
        return $this->aCharacter;
    }

    /**
     * @return string|null
     */
    public function getAccessMask()
    {
        return ($this->hasInfo()) ? $this->oInfo->accessMask : null;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return ($this->hasInfo()) ? $this->oInfo->type : null;
    }

    /**
     * @return string|null
     */
    public function getExpires()
    {
        return ($this->hasInfo()) ? $this->oInfo->expires : null;
    }
}