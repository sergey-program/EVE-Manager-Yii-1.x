<?php

class clDemand
{
    /**
     * @param $sCharacterID
     * @param $sStationID
     *
     * @return array
     */
    public static function loadAllAsList($sCharacterID, $sStationID)
    {
        $aReturn = array();
        $aAttr = array('characterID' => $sCharacterID);

        if ($sStationID) {
            $aAttr['stationID'] = $sStationID;
        }

        $aDemand = MarketDemand::model()->findAllByAttributes($aAttr);

        foreach ($aDemand as $oDemand) {
            $aReturn[] = new cDemand($oDemand);
        }

        return $aReturn;
    }

    /**
     * @param string|int $sCharacterID
     *
     * @return array
     */
    public static function loadAllAsStationList($sCharacterID)
    {
        $aReturn = array();
        $aDemand = MarketDemand::model()->findAllByAttributes(array('characterID' => $sCharacterID), array('group' => 'stationID'));

        foreach ($aDemand as $oDemand) {
            $aReturn[] = new cStation($oDemand->stationID);
        }

        return $aReturn;
    }

    /**
     * @param string|int $sDemandID
     * @param bool       $bAsComponent
     *
     * @return MarketDemand|cDemand|null
     */
    public static function loadOne($sDemandID, $bAsComponent = true)
    {
        $oDemand = MarketDemand::model()->findAllByPk($sDemandID);

        return ($bAsComponent) ? new cDemand($oDemand) : $oDemand;
    }
}