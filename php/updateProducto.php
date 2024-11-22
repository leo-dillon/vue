<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Content-Type: application/json");
require_once('conexion.php');

try {
    // Decodificar el JSON recibido
    $producto = json_decode(file_get_contents('php://input'), true);

    if ($producto === null) {
        throw new Exception('Error decoding JSON');
    }

    $idProducto = $producto["id"];
    $nombreP = $producto["nombre"];
    $precioP = $producto["precio"];
    $imagenP = $producto["imagen"];
    $descripcionP = $producto["descripcion"];
    $categoriaP = $producto["categoria"];

    $sql = "UPDATE productos 
            SET 
                nombre = :nombre, 
                precio = :precio, 
                imagen = :imagen, 
                descripcion = :descripcion, 
                categoria = :categoria 
            WHERE 
                id = :id";

    $stm = $pdo->prepare($sql);
    $stm->bindParam(':id', $idProducto, PDO::PARAM_INT);
    $stm->bindParam(':nombre', $nombreP, PDO::PARAM_STR);
    $stm->bindParam(':precio', $precioP, PDO::PARAM_INT);
    $stm->bindParam(':imagen', $imagenP, PDO::PARAM_STR);
    $stm->bindParam(':descripcion', $descripcionP, PDO::PARAM_STR);
    $stm->bindParam(':categoria', $categoriaP, PDO::PARAM_STR);

    if ($stm->execute()) {
        echo json_encode(["success" => true, "message" => "Producto actualizado correctamente"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error al actualizar el producto"]);
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
