<?php

class clDemand
{
    const AS_STATION = 'as_station';
    const AS_LIST = 'as_list';

    private $sCharacterID;
    private $sStationID;
    private $sResultAs;

    /**
     * @param string|int|null $sCharacterID
     * @param string|int|null $sStationID
     * @param string|null     $sResultAs
     */
    public function __construct($sCharacterID = null, $sStationID = null, $sResultAs = self::AS_LIST)
    {
        $this
            ->setCharacterID($sCharacterID)
            ->setStationID($sStationID)
            ->setResultAs($sResultAs);
    }

    /**
     * @param string|int $sCharacterID
     *
     * @return $this
     */
    public function setCharacterID($sCharacterID)
    {
        $this->sCharacterID = $sCharacterID;

        return $this;
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
     * @param string $sResultAs
     *
     * @return $this
     */
    public function setResultAs($sResultAs)
    {
        $this->sResultAs = $sResultAs;

        return $this;
    }

    /**
     * @return array
     */
    public function load()
    {
        $aResult = array();
        $aAttributes = array('characterID' => $this->sCharacterID);

        if ($this->sStationID) {
            $aAttributes['stationID'] = $this->sStationID;
        }

        $aDemand = MarketDemand::model()->findAllByAttributes($aAttributes);

        foreach ($aDemand as $oDemand) {
            $cDemand = new cDemand($oDemand);

            if ($this->sResultAs === self::AS_STATION) {
                if (!isset($aResult[$cDemand->getStationID()])) {
                    $aResult[$cDemand->getStationID()] = new cStation($cDemand->getStationID());
                }

                $aResult[$cDemand->getStationID()]->addDemand($cDemand);
            } elseif ($this->sResultAs === self::AS_LIST) {
                $aResult[] = $cDemand;
            }
        }

        return $aResult;
    }
}