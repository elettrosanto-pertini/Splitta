<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../../database/Database.php');
include_once('../../modelli/Invite.php');
include_once('../../modelli/Group.php');


$database = new Database;
$db = $database->connect();

$Invite = new Invite($db);
$Group = new Group($db);
// Get raw data from the client
$data = json_decode(file_get_contents('php://input'));
session_start();

//set invite inviter name
$Invite->inviter_name = $_SESSION['user']['username'];

//**********************FETCH DELL'ID GRUPPO************************************
//set group
$Group->group_name = $data->nomeGruppoData;
$Group->creator_name = $_SESSION['user']['username'];

//get group_id
$result = $Group->read_single();
$risultato = $result->fetch(PDO::FETCH_ASSOC);
$gr_id = $risultato['group_id'];
/*******************************************************************************/


$invitati = $data->invitedArray;

foreach($invitati as $invitato){
    $Invite->invited_name = $invitato;
    $Invite->new_group_id = $gr_id;
    if($Invite->create()===false){
        exit(json_encode(array('result'=>false, 'message'=>'Accidenti! Non siamo riusciti ad inviare gli inviti. Riprova più tardi.')));
    }
}
exit(json_encode(array('result'=>true)));