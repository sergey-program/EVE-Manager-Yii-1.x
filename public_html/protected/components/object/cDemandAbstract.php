<?php

class cDemandAbstract extends cObjectAbstract implements cObjectInterface
{
    /**
     * @param MarketDemand $oModel
     *
     * @return $this
     */
    public function setModel($oModel)
    {
        if ($oModel instanceof MarketDemand) {
            $this->oModel = $oModel;
        }

        return $this;
    }

    /**
     * @param string|int $sID
     *
     * @return $this
     */
    public function loadModel($sID)
    {
        $this->setModel(MarketDemand::model()->findAllByPk($sID));

        return $this;
    }
}