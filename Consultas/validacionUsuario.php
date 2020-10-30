<?php

include_once '../config.php';
include_once '../utils.php';

$dbConn = connect($db);    
    $sql = $dbConn->prepare("SELECT rol, ID_usuario, nombre FROM usuario WHERE correo = :correo and password = :password");
    $sql->bindValue(':correo', $_POST['correo']);
    $sql->bindValue(':password', $_POST['password']);
    $sql->execute();
    header("HTTP/1.1 200 OK");
    $res = $sql->fetch(PDO::FETCH_ASSOC);
    if ($res) {
        echo '{"code":"0", "msg":"done", "data":'.json_encode(json_encode($res)).'}';
    } else {
        echo '{"code":"-1", "msg":"Correo y contraseña incorrecta", "data":'.json_encode(json_encode($res)).'}';
    }   
    exit();

    header("HTTP/1.1 400 Bad Request");
?>