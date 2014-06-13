<?php

class cPriceFetcher implements cPriceFetcherInterface
{
    public $aTypeID;
    public $solarSystemID;
    private $sSolarSystemID_jita = '';

    /**
     * @param int|string|array $typeID
     * @param int|string       $sSolarSystemID
     */
    public function __construct($typeID = null, $sSolarSystemID = null)
    {
        if (!is_null($typeID)) {
            if (is_array($typeID)) {
                $this->aTypeID = $typeID;
            } else {
                $this->aTypeID[] = $typeID;
            }
        }

        if (!is_null($sSolarSystemID)) {
            $this->solarSystemID = $sSolarSystemID;
        }
    }

    /**
     * @param string|int $sTypeID
     *
     * @return $this
     */
    public function setTypeID($sTypeID)
    {
        $this->aTypeID[] = $sTypeID;

        return $this;
    }

    /**
     * @param string|int $sSolarSystemID
     *
     * @return $this
     */
    public function setSolarSystemID($sSolarSystemID)
    {
        $this->solarSystemID = $sSolarSystemID;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getSolarSystemID()
    {
        return $this->solarSystemID;
    }

    /**
     * @return string
     */
    public function getXmlContent()
    {
        return file_get_contents($this->getUrl());
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        $sType = '';

        for ($i = 0; $i <= count($this->aTypeID) - 1; $i++) {
            $sType .= 'typeid=' . $this->aTypeID[$i];
            if (isset($this->aTypeID[$i + 1])) {
                $sType .= '&';
            }
        }

        return 'http://api.eve-central.com/api/marketstat?' . $sType . '&usesystem=' . $this->solarSystemID;
    }
}