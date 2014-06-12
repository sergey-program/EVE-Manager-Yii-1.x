<?php

class clStation
{
    const TYPE_ORDER = 'type_order';
    const TYPE_DEMAND = 'type_demand';

    /**
     * @return array
     */
    public function all()
    {
        $aReturn = array();
        $aStation = array_merge(StaStation::model()->findAll(), ConquerableStation::model()->findAll());

        foreach ($aStation as $oStation) {
            $aReturn[] = new cStation($oStation);
        }

        return $aReturn;
    }

    public function has($sType, $sCharacterID)
    {
        
    }
}