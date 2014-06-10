<?php

class ApiController extends AbstractController
{
    /**
     * Simple form to add new api;
     */
    public function actionAdd()
    {
        $oApi = new Api('create');

        if ($this->isPost('Api', $oApi)) {
            if ($oApi->validate()) {
                $oApi->save();

                $this->redirect($this->createUrl('api/list'));
            }
        }

        $this->render('add', array('oApi' => $oApi));
    }

    /**
     *
     */
    public function actionList()
    {
        $this->render('list', array('cApiList' => cApiLoader::all()));
    }

    /**
     * @param string|int $sApiID
     */
    public function actionUpdate($sApiID)
    {
        $oApi = Api::model()->findByPk($sApiID);

        if ($oApi) {
            $oCall = new CallAccountCharacters();
            $oCall
                ->getUrlObject()
                ->setVarArray(array('keyID' => $oApi->keyID, 'vCode' => $oApi->vCode));

            $oExecutor = new cCallExecutor();
            $oExecutor
                ->addCall($oCall)
                ->doFetch()
                ->doParse()
                ->doUpdate();
        }

        $this->redirect($this->createUrl('api/list'));
    }

    /**
     * @param string|int $sApiID
     */
    public function actionDelete($sApiID)
    {
        $oApi = Api::model()->findByPk($sApiID);

        if ($oApi) {
            $oApi->delete();
        }

        $this->redirect($this->createUrl('api/list'));
    }
}