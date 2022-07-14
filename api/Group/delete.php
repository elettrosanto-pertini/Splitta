<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../../database/Database.php');
include_once('../../modelli/Group.php');


$database = new Database;
$db = $database->connect();

$data = json_decode(file_get_contents('php://input'));

$Group = new Group($db);
$Group->group_id = $data->deletedId;

if($Group->delete()===true){
    exit(json_encode(array('result'=>true, 'message'=>'Gruppo eliminato con successo, non hai più buffi!')));
}else{
    exit(json_encode(array('result'=>false, 'message'=>'ERRORE: qualsosa non va nel Database, riprova più tardi.')));
}