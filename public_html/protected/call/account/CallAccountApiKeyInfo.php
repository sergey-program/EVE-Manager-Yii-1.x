<?php

class CallAccountApiKeyInfo extends CallAbstract implements CallInterface
{
    protected $sFileType = 'account';
    protected $sFileName = 'apikeyinfo';
    private $aData = array();

    /**
     * @return void
     */
    public function parseResult()
    {
        if (!$this->cCallResult->isError()) {
            $oXml = $this->cCallResult->getXmlObject();
            $this->aData = cCallParser::getXmlAttr($oXml->result->key);
        }
    }

    /**
     * @return void
     */
    public function updateResult()
    {
        if (!empty($this->aData)) {
            $oApi = Api::model()->findByAttributes(array('keyID' => $this->getUrlObject()->getVar('keyID')));

            if ($oApi) {
                $oApiInfo = ApiInfo::model()->findByAttributes(array('apiID' => $oApi->id));

                if (!$oApiInfo) {
                    $oApiInfo = new ApiInfo('create');
                } else {
                    $oApiInfo->setScenario('create');
                }

                $oApiInfo->attributes = array(
                    'apiID' => $oApi->id,
                    'accessMask' => $this->aData['accessMask'],
                    'type' => $this->aData['type'],
                    'expires' => ($this->aData['expires']) ? date($this->aData['expires']) : null
                );

                if ($oApiInfo->validate()) {
                    $oApiInfo->save();
                }
            }
        }
    }
}