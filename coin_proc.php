<?php
include('dbconnect.php');

/*
 * DataTables example server-side processing script.
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'all_coins';

// Table's primary key
$primaryKey = 'id_0';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes



$columns = array(
    array( 'db' => 'coinid', 'dt' => 'id' ),
    array( 'db' => 'mint',  'dt' => 'mint' ),
    array( 'db' => 'typeid',   'dt' => 'type' ),
    array( 'db' => 'obvdie',     'dt' => 'obverse' ),
    array( 'db' => 'revdie',     'dt' => 'reverse' ),
    array( 'db' => 'weight',     'dt' => 'weight' ),
    array( 'db' => 'rotation',     'dt' => 'rotation' ),
    array( 'db' => 'size',     'dt' => 'size' ),
    array( 'db' => 'material',     'dt' => 'materials' ),
    array( 'db' => 'denom',     'dt' => 'denomenation' ),
    array( 'db' => 'title',     'dt' => 'title' ),
    array( 'db' => 'notes',     'dt' => 'notes' )

);

// SQL server connection information
$sql_details = array(
    'user' => $dbuser,
    'pass' => $dbpass,
    'db'   => $dbname,
    'host' => $host
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.psql.php' );

echo json_encode(
  SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
);
