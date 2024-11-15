<?php
    // Permito acceso extenos al PHP
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    require_once('conexion.php');
    $jsonData = file_get_contents('php://input');
    $user = json_decode( $jsonData);
    $name = $user->name;
    $email = $user->email;
    $password = md5(  $user->password );

    $sql = "INSERT INTO usuario( name, email, password)
            VALUES(:name, :email, :password)";

    $stm =$pdo->prepare($sql);
    $stm->bindParam(':name', $name );
    $stm->bindParam(':email', $email );
    $stm->bindParam(':password', $password );

    if( $stm->execute()) {
        echo( json_encode( ['msg' => 'Ok']   ));
    } else {
        echo( json_encode( ['msg' => 'Error']   ));
    }

    

?>