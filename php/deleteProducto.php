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
    $id = $data['id'];
    $sql = "DELETE FROM productos WHERE id = :id";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(':id', $id, PDO::PARAM_INT);
    $stm->execute();

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}

?>