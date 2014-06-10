<?php

class CallAccountCharacters extends CallAbstract implements CallInterface
{
    protected $sFileType = 'account';
    protected $sFileName = 'characters';
    private $aData = array(); // result of $this->parseResult();

    /**
     * @return void
     */
    public function parseResult()
    {
        if (!$this->cCallResult->isError()) {
            $oXml = $this->cCallResult->getXmlObject();

            foreach ($oXml->result->rowset->row as $oRow) {
                $this->aData[] = cCallParser::getXmlAttr($oRow);
            }
        }
    }

    /**
     * @return void
     */
    public function updateResult()
    {
        if (!empty($this->aData)) {
            $oApi = Api::model()->findByAttributes(array('keyID' => $this->getUrlObject()->getVar('keyID')));

            foreach ($this->aData as $aCharacter) {
                $oCharacter = ApiCharacter::model()->findByAttributes(array('characterID' => $aCharacter['characterID'], 'apiID' => $oApi->id));

                if (!$oCharacter) {
                    $oCharacter = new ApiCharacter('create');
                } else {
                    $oCharacter->setScenario('create');
                }

                $oCharacter->attributes = array(
                    'apiID' => $oApi->id,
                    'characterID' => $aCharacter['characterID'],
                    'characterName' => $aCharacter['name'],
                    'corporationID' => $aCharacter['corporationID'],
                    'corporationName' => $aCharacter['corporationName'],
                    'allianceID' => $aCharacter['allianceID'],
                    'allianceName' => $aCharacter['allianceName'],
                    'factionID' => $aCharacter['factionID'] ? $aCharacter['factionID'] : null,
                    'factionName' => $aCharacter['factionName'] ? $aCharacter['factionName'] : null
                );

                if ($oCharacter->validate()) {
                    $oCharacter->save();
                }
            }
        }
    }
}