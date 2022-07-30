<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../../database/Database.php');
include_once('../../modelli/Club.php');


$database = new Database;
$db = $database->connect();

$Club = new Club($db);
session_start();

$Club->club_group_id =$_SESSION['gruppo_id'];
$data = json_decode(file_get_contents('php://input'), true);


for($i=0; $i<count($data); $i++){
    $Club->club_user_name = $data[$i]['nome'] ;
    $Club->balance = $data[$i]['balance'];
    if($Club->update_balance()){
        continue;
    }else{
        exit(json_encode(array('message'=>'OPS! C\'è stato un problema interno. Riprova più tardi.')));
    }
}

exit(json_encode(array('message'=>'WOW! Forse era meglio pagare alla romana...', 'momo'=>$data)));