<?php

class CallAccountCharacters extends CallAbstract implements CallInterface
{
    protected $sFileType = 'account';
    protected $sFileName = 'characters';
    private $aData = array(); // result of $this->parseResult();

    /**
     * @return void
     */
    public function setupStorage()
    {
        $this
            ->getStorage()
            ->setRequire('keyID', cCallStorage::ALIAS_URL)
            ->setRequire('vCode', cCallStorage::ALIAS_URL)
            ->setRequire('apiID');
    }

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
        if (!empty($this->aData) && $this->getStorage()->checkRequire()) {
            $sApiID = $this->getStorage()->getVar('apiID');

            foreach ($this->aData as $aCharacter) {
                $oCharacter = ApiCharacter::model()->findByAttributes(array('characterID' => $aCharacter['characterID'], 'apiID' => $sApiID));

                if ($oCharacter) {
                    $oCharacter->setScenario('create');
                } else {
                    $oCharacter = new ApiCharacter('create');
                }

                $oCharacter->attributes = array(
                    'apiID' => $sApiID,
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