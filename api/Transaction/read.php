<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../../database/Database.php');
include_once('../../modelli/Transaction.php');
session_start();

$database = new Database;
$db = $database->connect();

$Transaction = new Transaction($db);
$Transaction->tr_group_id = $_SESSION['gruppo_id'];

$risultati = $Transaction->read()->fetchAll();

exit(json_encode($risultati));