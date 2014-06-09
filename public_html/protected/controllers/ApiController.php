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
        $this->render('list', array());
    }
}