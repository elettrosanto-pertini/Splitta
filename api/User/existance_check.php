<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');

include_once('./../../database/Database.php');
include_once('./../../modelli/User.php');

$database = new Database;
$db = $database->connect();

$User = new User($db);

$data = json_decode(file_get_contents('php://input'));
$User->username = $data->usr;
session_start();
if($_SESSION['user']['username']==$User->username){
    exit(json_encode(array('result'=>2)));
}

$result = $User->read_single();
$num = $result->rowCount();

if($num === 1){
    echo json_encode(array('result'=>true));
}else{
    echo json_encode(array('result'=>false));   
}