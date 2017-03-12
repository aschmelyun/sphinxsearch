<?php
return [
        'host'    => '127.0.0.1',
        'port'    => 9312,
        'timeout' => 30,
        'indexes' => [
            'index_alias'   => [    # index_alias: set a index alias
                'index'     => 'my_index_name', # my_index_name: sphinx index name
                'table'     => 'table_name',    # table_name: table name
                'column'    => 'primary_key_id' # primary_key_id: table primary key, such as id
            ],
        ],

        # connection name, defined in array $connections in config/database.conf
        'connection' => 'database_connection_name'
];