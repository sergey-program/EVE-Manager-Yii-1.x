<?php

class DemandController extends AbstractController
{
    /**
     * @param string|int $sCharacterID
     */
    public function actionCharacter($sCharacterID)
    {
        $aData = array(
            'cCharacter' => new cCharacter($sCharacterID)
        );

        $this->render('character', $aData);
    }

    /**
     * @param string|int $sCharacterID
     * @param string|int $sStationID
     */
    public function actionStation($sCharacterID, $sStationID)
    {
        $aData = array(
            'cCharacter' => new cCharacter($sCharacterID),
            'cStation' => new cStation($sStationID)
        );

        $this->render('station', $aData);
    }
}