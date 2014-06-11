<?php

class CharacterController extends AbstractController
{
    /**
     *
     */
    public function actionList()
    {
        $this->render('list', array('aList' => cLoaderCharacter::all()));
    }
}