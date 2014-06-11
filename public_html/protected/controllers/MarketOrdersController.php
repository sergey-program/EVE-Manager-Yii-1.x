<?php

class MarketOrdersController extends AbstractController
{
    /**
     *
     */
    public function actionUpdate()
    {
        $cApiLoader = cLoaderApi::all();
        $oExecutor = new cCallExecutor();

        foreach ($cApiLoader as $cApi) {

            if (!$cApi->hasCharacters()) {
                continue;
            }

            foreach ($cApi->getCharacters() as $cCharacter) {
                $oCallMarketOrders = new CallCharacterMarketOrders();
                $oCallMarketOrders
                    ->getStorage()
                    ->setVar('keyID', $cApi->getKeyID(), cCallStorage::ALIAS_URL)
                    ->setVar('vCode', $cApi->getVCode(), cCallStorage::ALIAS_URL)
                    ->setVar('characterID', $cCharacter->getCharacterID(), cCallStorage::ALIAS_URL);

                $oExecutor->addCall($oCallMarketOrders);
            }
        }

        $oExecutor->doFetch()->doParse()->doUpdate();

        $this->redirect($this->createUrl('character/list'));
    }

    /**
     *
     */
    public function actionStation($sCharacterID, $sStationID)
    {


        $aData = array(
            'cCharacter' => cLoaderCharacter::byCharacterID($sCharacterID),
            'cStation' => cLoaderStation::byStationID($sStationID)
        );

        $this->render('station', $aData);
    }

    /**
     * @param string|int $sCharacterID
     */
    public function actionCharacter($sCharacterID)
    {
        $aData = array(
            'cCharacter' => cLoaderCharacter::byCharacterID($sCharacterID)
        );

        $this->render('character', $aData);
    }
}