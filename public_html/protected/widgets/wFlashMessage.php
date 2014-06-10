<?php

class wFlashMessage extends CWidget
{
    /**
     *
     */
    public function run()
    {
        $this->render('flash_message', array());
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return Yii::app()->user->getFlashes();
    }

    /**
     * @return bool
     */
    public function hasMessage()
    {
        return (Yii::app()->user->hasFlash('success') || Yii::app()->user->hasFlash('danger') || Yii::app()->user->hasFlash('warning'));
    }
}