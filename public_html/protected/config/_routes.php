<?php

return array(
    ''          => 'index/index',
    '/'         => 'index/index',

    'api/add'                   => 'api/add',
    'api/list'                  => 'api/list',
    'api/<sApiID:\d+>/update'   => 'api/update',
    'api/<sApiID:\d+>/delete'   => 'api/delete',

    'character/list'            => 'character/list',

    'market-orders/update'      => 'marketOrders/update',
    'character/<sCharacterID:\d+>/market-orders'                            => 'marketOrders/character',
    'character/<sCharacterID:\d+>/market-orders/station/<sStationID:\d+>'   => 'marketOrders/station',
);