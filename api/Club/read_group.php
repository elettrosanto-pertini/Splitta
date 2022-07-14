<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../../database/Database.php');
include_once('../../modelli/Club.php');
include_once('../../modelli/Group.php');


$database = new Database;
$db = $database->connect();

$Club = new Club($db);
$Group = new Group($db);
session_start();

$Group->group_id = $_SESSION['gruppo_id'];
$Group->group_name = $_SESSION['group_name'];
$nameCheck = $Group->name_check();
$nameCheck = $nameCheck->fetch(PDO::FETCH_ASSOC);


$Club->club_group_id = $_SESSION['gruppo_id'];
$group_name = htmlspecialchars(stripslashes($_SESSION["group_name"]));

$result = $Club->read_from_group_id();
$result = $result->fetchAll();

$risposta = ['result'=>true, 'utenti'=>[], 'group_name'=>$group_name, 'gruppo_id'=>$_SESSION['gruppo_id']];

if($nameCheck<=0){
    $risposta['result']=false;
}else{
    for($i=0;$i<count($result);$i++){
        array_push($risposta['utenti'], ['nome'=>$result[$i]['club_user_name'], 'balance'=>$result[$i]['balance']]);
    }
}

$_SESSION['gruppo_id'] = '';
$_SESSION['group_name'] = '';

exit(json_encode($risposta));