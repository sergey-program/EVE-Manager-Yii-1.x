<?php

class clOrder
{
    /**
     * Return array of orders;
     *
     * @param string|int      $sCharacterID
     * @param string|int|null $sStationID
     *
     * @return array
     */
    public static function loadAllAsList($sCharacterID, $sStationID = null)
    {
        $aReturn = array();
        $aAttr = array('characterID' => $sCharacterID, 'orderState' => ApiCharacterMarketOrders::ORDER_STATE_OPEN);

        if ($sStationID) {
            $aAttributes['stationID'] = $sStationID;
        }

        $aOrder = ApiCharacterMarketOrders::model()->findAllByAttributes($aAttr);

        foreach ($aOrder as $oOrder) {
            $aReturn[] = new cOrder($oOrder);
        }

        return $aReturn;
    }

    /**
     * Return array of cStation components;
     *
     * @param string $sCharacterID
     *
     * @return array
     */
    public static function loadAllAsStationList($sCharacterID)
    {
        $aReturn = array();
        $aAttr = array('characterID' => $sCharacterID, 'orderState' => ApiCharacterMarketOrders::ORDER_STATE_OPEN);
        $aOrder = ApiCharacterMarketOrders::model()->findAllByAttributes($aAttr, array('group' => 'stationID'));

        foreach ($aOrder as $oOrder) {
            $aReturn[] = new cStation($oOrder->stationID);
        }

        return $aReturn;
    }
}