<?php
    $id = $_GET['id'];
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    require_once('conexion.php');
    $sql = "SELECT * FROM productos WHERE id = :id";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(':id', $id, PDO::PARAM_INT);
    $stm->execute();
    $productos = $stm->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($productos);
?>  