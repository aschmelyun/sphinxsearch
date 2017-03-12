<?php
return [
    'host'    => '127.0.0.1',  # sphinx host
    'port'    => 9312,  # sphinx port
    'timeout' => 30,
    'indexes' => [
        'index_1_i' => [
            'modelname' => 'App\Model1',
            'table' => 'table1', 
            'column' => 'id'
        ],
        'index_2_i' => [
            'modelname' => 'App\Model2',
            'table' => 'table2',
            'column' => 'id'
        ],
        'index_3_i' => [
            'modelname' =>  'App\Model3',
            'table' => 'table3',
            'column' => 'id'
        ],
    ],

    # connection name, defined in array $connections in config/database.conf
    'connection' => 'database_connection_name'
];