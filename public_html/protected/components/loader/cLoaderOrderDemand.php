<?php

class cLoaderOrderDemand
{
    /**
     * @return array
     */
    public function getAll()
    {
        $aReturn = array();
        $aDemand = MarketOrderDemand::model()->findAll();

        foreach ($aDemand as $oDemand) {
            $aReturn[] = new cOrderDemand($oDemand);
        }

        return $aReturn;
    }

    /**
     * @param $sStationID
     *
     * @return array
     */
    public function getByStationID($sStationID)
    {
        $aReturn = array();
        $aDemand = MarketOrderDemand::model()->findByAttributes(array('stationID' => $sStationID));

        foreach ($aDemand as $oDemand) {
            $aReturn[] = new cOrderDemand($oDemand);
        }

        return $aReturn;
    }
}