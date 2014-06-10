<?php

class IndexController extends AbstractController
{
    /**
     *
     */
    public function actionIndex()
    {

        $oCall = new CallAccountCharacters();
        $oCall
            ->getUrlObject()
            ->setVarArray(array('keyID' => '3379085', 'vCode' => 'kNVjD83WDLZZlXiR7dSC5QeNrcOiicnbOKpljskZ03XnHenNIkHrOosDYXDnCVoG'));

        $oExecutor = new cCallExecutor();
        $oExecutor
            ->addCall($oCall)
            ->doFetch()
            ->doParse()
            ->doUpdate();

        $this->render('/index');
    }
}