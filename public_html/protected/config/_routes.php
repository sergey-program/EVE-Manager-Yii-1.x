<?php

return array(
    ''          => 'index/index',
    '/'         => 'index/index',

    'api/add'                   => 'api/add',
    'api/list'                  => 'api/list',
    'api/<sApiID:\d+>/update'   => 'api/update',
    'api/<sApiID:\d+>/delete'   => 'api/delete',

    'market-orders'             => 'market/order/index',
    'market-orders/update'      => 'market/order/update'
);