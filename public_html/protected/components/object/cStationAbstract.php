<?php

class cStationAbstract extends cObjectAbstract implements cObjectInterface
{
    protected $aOrder = array();
    protected $aDemand = array();

    /**
     * @param StaStation|ConquerableStation $oModel
     *
     * @return $this
     */
    public function setModel($oModel)
    {
        if ($oModel instanceof StaStation || $oModel instanceof ConquerableStation) {
            $this->oModel = $oModel;
        }

        return $this;
    }

    /**
     * @param string|int $sStationID
     *
     * @return $this
     */
    public function loadModel($sStationID)
    {
        $oStaStation = StaStation::model()->findByAttributes(array('stationID' => $sStationID));

        if ($oStaStation) {
            $this->setModel($oStaStation);
        }

        $oCnqStation = ConquerableStation::model()->findByAttributes(array('stationID' => $sStationID));

        if ($oCnqStation) {
            $this->setModel($oCnqStation);
        }

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

    /**
     * @param cDemand $oDemand
     *
     * @return $this
     */
    public function addDemand(cDemand $oDemand)
    {
        $this->aDemand[] = $oDemand;

        return $this;
    }
}