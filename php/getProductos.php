<?php
    header('Access-Control-Allow-Origin: *');
    require_once('conexion.php');
    $sql = "SELECT *
            FROM productos";
    $stm = $pdo->query($sql);
    $productos =  $stm->fetchAll( PDO::FETCH_ASSOC );

    echo(json_encode( $productos));

?>  