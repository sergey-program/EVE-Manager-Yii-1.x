<?php

class cLoaderStation
{
    /**
     * @param string|int $sStationID
     *
     * @return cStation
     */
    public static function byStationID($sStationID)
    {
        $cStation = new cStation($sStationID);

        return $cStation;
    }
}