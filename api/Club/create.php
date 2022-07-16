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

$data = json_decode(file_get_contents('php://input'));

$Club = new Club($db);
$Club->club_user_name = $data->invited_name;
$Club->club_group_id = $data->new_group_id;

if($Club->create()===true){
    echo json_encode(array('result'=>true, 'message'=>'Invito accettato, hai un nuovo gruppo!'));
}else{
    echo json_encode(array('result'=>false, 'message'=>'C\'è un problema con il database! Controlla che tu non abbia già creato un gruppo con questo nome oppure riprova più tardi.'));
}