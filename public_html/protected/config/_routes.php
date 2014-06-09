<?php

return array(
    ''          => 'index/index',
    '/'         => 'index/index',

    'update/character/orders'   => 'update/marketOrders',
    'update/stations'           => 'update/conquerableStations',

    'location/list'                             => 'location/list',
    'location/<sLocationID:\d+>'                => 'location/view',
    'location/<sLocationID:\d+>/add/item'       => 'location/addItem',

    'character/add'                             => 'character/add',
    'character/<sCharacterID:\d+>/edit'         => 'character/edit',
    'character/<sCharacterID:\d+>/delete'       => 'character/delete',

    'current'   => 'current/index',

    'ajax/find/station'     => 'ajax/findStation',
    'ajax/find/item'        => 'ajax/findItem'
);