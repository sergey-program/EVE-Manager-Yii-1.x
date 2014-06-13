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

    /**
     *
     */
    public function actionList()
    {
        $this->render('list', array('aApi' => clApi::loadAll()));
    }

    /**
     * @param string|int $sApiID
     */
    public function actionUpdate($sApiID)
    {
        $oApi = Api::model()->findByPk($sApiID);

        if ($oApi) {
            $oCallChar = new CallAccountCharacters();
            $oCallChar
                ->getStorage()
                ->setVar('keyID', $oApi->keyID, cCallStorage::ALIAS_URL)
                ->setVar('vCode', $oApi->vCode, cCallStorage::ALIAS_URL)
                ->setVar('apiID', $oApi->id);

            $oCallInfo = new CallAccountApiKeyInfo();
            $oCallInfo
                ->getStorage()
                ->setVar('keyID', $oApi->keyID, cCallStorage::ALIAS_URL)
                ->setVar('vCode', $oApi->vCode, cCallStorage::ALIAS_URL)
                ->setVar('apiID', $oApi->id);

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
}