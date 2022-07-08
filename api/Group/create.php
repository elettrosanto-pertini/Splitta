<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../../database/Database.php');
include_once('../../modelli/Group.php');

$database = new Database;
$db = $database->connect();


$Group = new Group($db);
// Get raw data from the client
$data = json_decode(file_get_contents('php://input'));

$Group->group_name = $data->nomeGruppoData;
$Group->size = $data->sizeData;
$Group->total_credit = $data->totalCreditData;

session_start();
$Group->creator_name = $_SESSION['user']['username'];

if($Group->create() === true){
    echo json_encode(array('result'=>true, 'message'=>'Gruppo creato con successo!'));
}else{
    echo json_encode(array('result'=>false, 'message'=>'C\'è un problema con il database! Controlla che tu non abbia già creato un gruppo con questo nome oppure riprova più tardi.'));
}