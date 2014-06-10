<?php

class cApiLoader
{
    private $aApi = array();

    /**
     * @return array
     */
    public static function all()
    {
        $aApi = array();

        foreach (Api::model()->findAll() as $oApi) {
            $aApi[] = new cApi($oApi);
        }

        return $aApi;
    }

    /**
     * @param string|int $sKeyID
     *
     * @return cApi
     */
    public static function byKeyID($sKeyID)
    {
        $oApi = Api::model()->findAllByAttributes(array('keyID' => $sKeyID));

        return new cApi($oApi);
    }
}