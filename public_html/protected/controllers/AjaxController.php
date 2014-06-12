<?php

class AjaxController extends AbstractController
{
    /**
     * Находит станцию по имени (%like%).
     */
    public function actionFindStation()
    {
        $sql = '(SELECT sStation.stationID, sStation.stationName, sStation.stationTypeID
                    FROM staStations as sStation WHERE sStation.stationName LIKE "%' . $_GET['q'] . '%")
                UNION
                (SELECT cStation.stationID, cStation.stationName, cStation.stationTypeID
                    FROM _conquerable_station as cStation WHERE cStation.stationName LIKE "%' . $_GET['q'] . '%")';

        $aResult = Yii::app()->db->createCommand($sql)->queryAll($sql);

        echo CJSON::encode($aResult);
    }

    /**
     * Находит предмет по имени (%like%) которые уже не установлены на текущий $_POST['sLocationID'].
     */
    public function actionFindItem()
    {
        $sql = 'SELECT typeID FROM tbl_location_request WHERE locationID = ' . $_POST['sLocationID'];
        $aAvoidList = Yii::app()->db->createCommand($sql)->queryAll();

        $aAvoid = array();

        foreach ($aAvoidList as $aAvoidSingle) {
            $aAvoid[] = $aAvoidSingle['typeID'];
        }

        $sqlAdd = ''; //($aAvoid) ? 'AND typeID NOT IN (' . implode(',', $aAvoid) . ') ' : '';
        $sql = 'SELECT typeID, typeName FROM invTypes WHERE typeName LIKE "%' . $_POST['queryString'] . '%" ' . $sqlAdd . ' AND published ="1" ORDER BY typeName';
        $aResult = Yii::app()->db->createCommand($sql)->queryAll($sql);

        echo CJSON::encode($aResult);
    }
}