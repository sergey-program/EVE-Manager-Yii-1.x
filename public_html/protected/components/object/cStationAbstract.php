<?php

class cStationAbstract
{
    protected $sStationID;
    protected $oStation;
    protected $aOrder = array();

    /**
     * @param string|int|null $sStationID
     */
    public function __construct($sStationID = null)
    {
        if (!is_null($sStationID)) {
            $this->sStationID = $sStationID;
            $this->loadModel($sStationID);
        }
    }

    /**
     *
     */
    private function loadModel($sStationID = null)
    {
        $sStationID = ($sStationID) ? $sStationID : $this->sStationID;
        $oStaStation = StaStation::model()->findByAttributes(array('stationID' => $sStationID));

        if ($oStaStation) {
            $this->setModel($oStaStation);
        }

        $oCnqStation = ConquerableStation::model()->findByAttributes(array('stationID' => $sStationID));

        if ($oCnqStation) {
            $this->setModel($oCnqStation);
        }

    }

    /**
     * @param string|int $sStationID
     *
     * @return $this
     */
    public function setStationID($sStationID)
    {
        $this->sStationID = $sStationID;

        return $this;
    }

    /**
     * @param CActiveRecord $oStation
     *
     * @return $this
     */
    public function setModel($oStation)
    {
        $this->oStation = $oStation;

        return $this;
    }

    /**
     * @param cOrder $oOrder
     *
     * @return $this
     */
    public function addOrder(cOrder $oOrder)
    {
        $this->aOrder[] = $oOrder;

        return $this;
    }
}