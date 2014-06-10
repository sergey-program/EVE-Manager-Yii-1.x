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

                $this->redirect($this->createUrl('api/update', array('sApiID' => $oApi->id)));
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
            $oCallChar = new CallAccountCharacters();
            $oCallChar->getUrlObject()->setVarArray(array('keyID' => $oApi->keyID, 'vCode' => $oApi->vCode));
            $oCallInfo = new CallAccountApiKeyInfo();
            $oCallInfo->getUrlObject()->setVarArray(array('keyID' => $oApi->keyID, 'vCode' => $oApi->vCode));

            $oExecutor = new cCallExecutor();
            $oExecutor
                ->addCall($oCallChar)
                ->addCall($oCallInfo)
                ->doFetch()
                ->doParse()
                ->doUpdate();

            $this->setFlash('success', 'Api #' . $oApi->id . ' was updated.');
        } else {
            $this->setFlash('danger', 'Such api doesn\'t exist.');
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
            $this->setFlash('success', 'Api was deleted.');
            $oApi->delete();
        } else {
            $this->setFlash('danger', 'Such api doesn\'t exist.');
        }

        $this->redirect($this->createUrl('api/list'));
    }
}