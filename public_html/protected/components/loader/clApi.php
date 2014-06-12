<?php

class clApi
{
    private $sKeyID;

    /**
     * @param string|int|null $sKeyID
     */
    public function __construct($sKeyID = null)
    {
        $this->setKeyID($sKeyID);
    }

    /**
     * @param string|int $sKeyID
     *
     * @return $this
     */
    public function setKeyID($sKeyID)
    {
        $this->sKeyID = $sKeyID;

        return $this;
    }

    /**
     * @return array
     */
    public function load()
    {
        $aReturn = array();

        if ($this->sKeyID) {
            $aApi = Api::model()->findByAttributes(array('keyID' => $this->sKeyID));
        } else {
            $aApi = Api::model()->findAll();
        }

        foreach ($aApi as $oApi) {
            $aReturn[] = new cApi($oApi);
        }

        return $aReturn;
    }

    /**
     * @param string|int $sKeyID
     *
     * @return cApi
     */
    public function loadByKeyID($sKeyID)
    {
        $this->setKeyID($sKeyID);
        $aApi = $this->load();

        return $aApi[0];
    }
}