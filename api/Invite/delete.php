<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../../database/Database.php');
include_once('../../modelli/Invite.php');


$database = new Database;
$db = $database->connect();

$Invite = new Invite($db);
$data = json_decode(file_get_contents('php://input'));
$Invite->invite_id = $data->id;

if($Invite->delete()===true){
    exit(json_encode(array('message'=>'Invito eliminato con successo!')));
}else{
    exit(json_encode(array('message'=>'ERRORE: qualsosa non va nel Database, riprova più tardi.')));
}