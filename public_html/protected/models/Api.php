<?php

class Api extends AbstractModel
{
    /**
     * @param string $sClass
     *
     * @return CActiveRecord
     */
    public static function model($sClass = __CLASS__)
    {
        return parent::model($sClass);
    }

    /**
     * @return string
     */
    public function tableName()
    {
        return '{{api}}';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return array(
            array('keyID, vCode', 'required', 'on' => 'create')
        );
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return array(
            'keyID' => 'Key ID',
            'vCode' => 'Verification Code'
        );
    }

    /**
     * @return array
     */
    public function relations()
    {
        return array();
    }
}