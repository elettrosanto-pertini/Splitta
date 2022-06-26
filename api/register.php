<?php
// riceve richieste di POST dal client
// restituisce conferma/errore

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../database/Database.php');
//include_once('../database/DB_constants.php');

$database = new Database;
$db = $database->connect();

// Get raw data from the user
$data = json_decode(file_get_contents('php://input'));

//polish raw data (USR, PWD, MAIL)
$user = htmlspecialchars(stripslashes(trim($data->usr)));
$password = htmlspecialchars(stripslashes(trim($data->pwd)));
$email = htmlspecialchars(stripslashes(($data->mail)));


//hash password
$password = password_hash($password, PASSWORD_DEFAULT);


//send data to DB (query)

// $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
$query = '
    INSERT INTO '.USERS_TABLE.'
    (user_name, password, user_mail) 
    VALUES (:user, :password, :email);
';

//manage response (message)

$stmt = $db->prepare($query);
if($stmt->execute([':user'=>$user, ':password'=>$password, ':email'=>$email])){
    echo json_encode(array('message'=>'Utente registrato!'));
}else{
    echo json_encode(array('message'=>'ERRORE: impossibile contattare il Database. Riprovare più tardi'));
}
