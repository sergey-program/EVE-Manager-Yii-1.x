<?php

class ErrorController extends AbstractController
{
    /**
     *
     */
    public function actionShow()
    {
        if ($aError = Yii::app()->errorHandler->error) {
            $this->render('show', array('aError' => $aError));
        }
    }
}
