<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header("Content-Type: application/json");
    require_once('conexion.php');
    $data = json_decode(file_get_contents("php://input"), true);
    $user = $data['mail'];
    $pass = $data['contraseña'];
    $sql = "SELECT *
            FROM usuarios
            WHERE mail = :user AND contraseña = :pass";
    $stm = $pdo->prepare($sql);
    $stm -> bindParam(':user', $user, PDO::PARAM_STR);
    $stm -> bindParam(':pass', $pass, PDO::PARAM_STR);    
    $stm -> execute();
    $result = $stm->fetchAll( PDO::FETCH_ASSOC );
    echo(json_encode( $result ));

?>