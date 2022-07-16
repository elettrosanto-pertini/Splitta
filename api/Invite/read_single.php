<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../../database/Database.php');
include_once('../../modelli/Invite.php');
include_once('../../modelli/Group.php');


$database = new Database;
$db = $database->connect();

$Invite = new Invite($db);
$data = json_decode(file_get_contents('php://input'));
$Invite->invite_id = $data->id;

$result = $Invite->read_single();

exit(json_encode($result));