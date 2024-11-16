<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header("Content-Type: application/json");
    require_once('conexion.php');
    try {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($data === null) {
            throw new Exception('Error decoding JSON');
        }
        
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $user = $data['mail'];
        $pass = $data['contraseña'];
        $usuario = $name . ' ' . $apellido;
        $sql = "INSERT INTO usuarios(
                nombre,
                apellido,
                usuario,
                contraseña,
                mail
            )
            VALUES(
                :nombre,
                :apellido,
                :usuario,
                :pass,
                :user
            )
            ";
        $stm = $pdo->prepare($sql);
        $stm->bindParam(':user', $user, PDO::PARAM_STR);
        $stm->bindParam(':pass', $pass, PDO::PARAM_STR);
        $stm->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stm->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $stm->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stm->execute();
        echo json_encode($result);
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }

?>