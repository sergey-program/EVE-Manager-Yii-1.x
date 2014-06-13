<?php

class Api extends AbstractModel
{
    public $id;
    public $keyID;
    public $vCode;

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
            'aCharacter' => array(self::HAS_MANY, 'ApiAccountCharacters', 'apiID'),
            'oApiKeyInfo' => array(self::HAS_ONE, 'ApiAccountApiKeyInfo', 'apiID')
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

        if ($this->oApiKeyInfo) {
            $this->oApiKeyInfo->delete();
        }

        parent::afterDelete();
    }
}