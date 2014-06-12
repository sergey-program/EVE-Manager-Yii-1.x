<?php

abstract class cCharacterAbstract extends cObjectAbstract implements cObjectInterface
{
    /**
     * @param ApiCharacter $oModel
     *
     * @return $this
     */
    public function setModel($oModel)
    {
        if ($oModel instanceof ApiCharacter) {
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
        $this->setModel(ApiCharacter::model()->findByAttributes(array('characterID' => $sID)));

        return $this;
    }
}