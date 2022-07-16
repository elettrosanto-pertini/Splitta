<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
// header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../../database/Database.php');
include_once('../../modelli/Invite.php');
include_once('../../modelli/Group.php');


$database = new Database;
$db = $database->connect();

$Invite = new Invite($db);

session_start();
$Invite->invited_name = $_SESSION['user']['username'];


$result = $Invite->read();
$result = $result->fetchAll();
//$result = $result[0];

$risposta = ['inviti'=>[]];

if($result>0){
    for($i=0;$i<count($result);$i++){
        $Invite->new_group_id = $result[$i]['new_group_id'];
        //echo json_encode($result[$i]['new_group_id']);
        $nomeGruppo = $Invite->get_group_name();
        $nomeGruppo = $nomeGruppo->fetch(PDO::FETCH_ASSOC);

        array_push($risposta['inviti'], ['inviter_name'=>$result[$i]['inviter_name'], 'invite_id'=>$result[$i]['invite_id'], 'group_name'=>$nomeGruppo['group_name']]);
    }
}

exit(json_encode($risposta));