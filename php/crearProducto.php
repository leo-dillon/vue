<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header("Content-Type: application/json");
    require_once('conexion.php');
    try{
        $producto = json_decode( file_get_contents('php://input'), true);
        if ($producto === null) {
            throw new Exception('Error decoding JSON');
        }
        $nombreP = $producto["nombre"];
        $precioP = $producto["precio"];
        $imagenP = $producto["imagen"];
        $descripcionP = $producto["descripcion"];
        $categoriaP = $producto["categoria"];
        $sql = "INSERT INTO productos(
            nombre,
            precio,
            imagen,
            descripcion,
            categoria
        )
        VALUES(
            :nombre,
            :precio,
            :imagen,
            :descripcion,
            :categoria
        )
        ";
        $stm =$pdo->prepare($sql);
        $stm->bindParam(':nombre', $nombreP, PDO::PARAM_STR );
        $stm->bindParam(':precio', $precioP, PDO::PARAM_INT );   
        $stm->bindParam(':imagen', $imagenP, PDO::PARAM_STR );
        $stm->bindParam(':descripcion', $descripcionP, PDO::PARAM_STR );
        $stm->bindParam(':categoria', $categoriaP, PDO::PARAM_STR );
        $stm -> execute();
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
?>