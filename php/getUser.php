<?php
    header('Access-Control-Allow-Origin: *');
    require_once('conexion.php');
    $sql = "SELECT *
            FROM usuarios";
    $stm = $pdo->query($sql);
    $users =  $stm->fetchAll( PDO::FETCH_ASSOC );

    echo(json_encode( $users));

?>