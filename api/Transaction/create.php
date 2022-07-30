<?php
// riceve richieste di POST dal client

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('./../../modelli/Transaction.php');
include_once('../../database/Database.php');


$database = new Database;
$db = $database->connect();

$Transaction = new Transaction($db);
session_start();

$data = json_decode(file_get_contents('php://input'));

$Transaction->tr_group_id = $_SESSION['gruppo_id'];
$Transaction->tr_amount = $data->tr_amount;
$Transaction->tr_payer_name = $data->tr_payer_name;
$Transaction->tr_receiver_name = $data->tr_receiver_name;
$Transaction->tr_name = $data->tr_name;

if($Transaction->create()){
    echo json_encode(array('result'=>true, 'message'=>'copy'));
}else{
    echo json_encode(array('result'=>false, 'message'=>'OPS! C\'è stato un errore interno nel registrare le transazioni, riprova più tardi'));
}
