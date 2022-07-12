<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../../database/Database.php');
include_once('../../modelli/Club.php');


$database = new Database;
$db = $database->connect();

$Club = new Club($db);
session_start();
$Club->club_user_name = $_SESSION['user']['username'];

$club_result = $Club->read_from_username();
$club_result = $club_result->fetchAll();

$output = [];
for($i=0;$i<count($club_result);$i++){
    $Club->club_group_id = $club_result[$i]['club_group_id'];
    $group = $Club->get_group_from_id();
    $group = $group->fetch(PDO::FETCH_ASSOC);

    $output[$i] = ['group_name'=>$group['group_name'], 'balance'=>$club_result[$i]['balance'], 'group_id'=>$group['group_id']];
}

exit(json_encode($output));