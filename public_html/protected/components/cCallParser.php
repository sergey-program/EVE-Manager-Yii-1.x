<?php

class cCallParser
{
    public static function getXmlAttr($oXml)
    {
        $aResult = null;

        if (is_object($oXml)) {
            foreach ($oXml->attributes() as $sKey => $sVal) {
                $aResult[$sKey] = (string)$sVal;
            }
        }

        return $aResult;
    }
}