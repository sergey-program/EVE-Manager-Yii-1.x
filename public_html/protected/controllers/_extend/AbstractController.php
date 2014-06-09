<?php

class AbstractController extends CController
{
    public $layout = 'default';
    public $sTitle = 'Welcome!';

    /**
     * @param null|string        $sVarName
     * @param null|AbstractModel $oModel
     *
     * @return bool
     */
    public function isPost($sVarName = null, AbstractModel $oModel = null)
    {
        $bReturn = Yii::app()->request->isPostRequest;

        if ($bReturn && !is_null($sVarName)) {
            $bReturn = isset($_POST[$sVarName]);

            if ($bReturn) {
                $oModel->attributes = $_POST[$sVarName];
            }
        }

        return $bReturn;
    }
}