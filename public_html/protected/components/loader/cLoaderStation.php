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
        $cStation = new cStation();
        $oStation = StaStation::model()->findByAttributes(array('stationID' => $sStationID));

        if ($oStation) {
            $cStation->setModel($oStation);
        }

        return $cStation;
    }
}