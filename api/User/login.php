<?php
// riceve richieste di POST dal client

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('./../../modelli/User.php');
include_once('../../database/Database.php');


$database = new Database;
$db = $database->connect();

$User = new User($db);

$data = json_decode(file_get_contents('php://input'));

$User->username = $data->usr;
$User->password = $data->pwd;

$risultato = $User->read_single();
$num = $risultato->rowCount();

if($num == 1){
    $risultato = $risultato->fetch(PDO::FETCH_ASSOC);
    $User->email = $risultato['user_mail'];
    $pass_check = password_verify($User->password, $risultato['password']);

    if($pass_check){
        session_start();
        $_SESSION['user'] = ['username'=>$User->username, 'email'=>$User->email];
        exit(json_encode(array('message'=>'Login effettuato. Benvenuto '.$_SESSION['user']['username'].'!'))); 
    }else{
        echo json_encode(array('message'=>'ERRORE: password errata'));
    }

}else{
    echo json_encode(array('message'=>'ERRORE: username errato'));
}