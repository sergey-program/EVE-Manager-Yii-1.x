<?php

class ApiController extends AbstractController
{
    /**
     * Simple form to add new api;
     */
    public function actionAdd()
    {
        $this->render('add', array());
    }
}