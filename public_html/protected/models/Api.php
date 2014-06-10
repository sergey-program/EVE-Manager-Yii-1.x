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
        return array(
            'aCharacter' => array(self::HAS_MANY, 'ApiCharacter', 'apiID'),
            'oInfo' => array(self::HAS_ONE, 'ApiInfo', 'apiID')
        );
    }

    /**
     * @return void
     */
    public function afterDelete()
    {
        foreach ($this->aCharacter as $oCharacter) {
            $oCharacter->delete();
        }

        if ($this->oInfo) {
            $this->oInfo->delete();
        }

        parent::afterDelete();
    }
}