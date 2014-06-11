<?php

class cCallStorage
{
    const ALIAS_DEFAULT = 'alias_default';
    const ALIAS_URL = 'alias_url';

    private $aStorage = array();
    private $aRequire = array();

    /**
     * @param string $sKey
     * @param string $sAlias
     *
     * @return $this
     */
    public function setRequire($sKey, $sAlias = self::ALIAS_DEFAULT)
    {
        $this->aRequire[$sAlias][] = $sKey;

        return $this;
    }

    /**
     * @param string $sKey
     * @param string $sValue
     * @param string $sAlias
     *
     * @return $this
     */
    public function setVar($sKey, $sValue, $sAlias = self::ALIAS_DEFAULT)
    {
        $this->aStorage[$sAlias][$sKey] = $sValue;

        return $this;
    }

    /**
     * @param string $sAlias
     *
     * @return bool
     */
    public function checkRequire($sAlias = self::ALIAS_DEFAULT)
    {
        $bResult = true;

        // isset means required were set
        if (isset($this->aRequire[$sAlias])) {
            // each require var name
            foreach ($this->aRequire[$sAlias] as $sRequireVar) {
                // search in storage array
                if (!isset($this->aStorage[$sAlias][$sRequireVar])) {
                    $bResult = false;
                    break;
                }
            }
        }

        return $bResult;
    }

    /**
     * @param string $sKey
     * @param string $sAlias
     *
     * @return null
     */
    public function getVar($sKey, $sAlias = self::ALIAS_DEFAULT)
    {
        return (isset($this->aStorage[$sAlias][$sKey])) ? $this->aStorage[$sAlias][$sKey] : null;
    }

    /**
     * @param string $sAlias
     *
     * @return array
     */
    public function getVarsByAlias($sAlias = self::ALIAS_DEFAULT)
    {
        return (isset($this->aStorage[$sAlias])) ? $this->aStorage[$sAlias] : array();
    }
}