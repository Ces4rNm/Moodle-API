<?php

    include_once '../config.php';
    include_once '../utils.php';

    $dbConn = connect($db);

    //Mostrar lista de post
    $sql = $dbConn->prepare("SELECT ID_usuario, nombre, facultad FROM usuario WHERE rol=2");
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    $res = $sql->fetchAll();
    if ($res) {
        echo '{"code":"0", "msg":"done", "data":'.json_encode(json_encode($res)).'}';
    } else {
        echo '{"code":"1", "msg":"No se encontraron docentes", "data":'.json_encode(json_encode($res)).'}';
    }  
    exit();

?>