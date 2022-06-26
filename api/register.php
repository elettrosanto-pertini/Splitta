<?php
// riceve richieste di POST dal client
// restituisce conferma/errore

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../database/Database.php');
include_once('../modelli/User.php');
//include_once('../database/DB_constants.php');

$database = new Database;
$db = $database->connect();


$User = new User($db);
// Get raw data from the user
$data = json_decode(file_get_contents('php://input'));


$User->username = $data->usr;
$User->password = $data->pwd;
$User->email = $data->mail;

if($User->create()){
    echo json_encode(array('message'=>'Utente registrato!'));
}else{
    echo json_encode(array('message'=>'ERRORE: impossibile contattare il Database. Riprovare più tardi'));
}
