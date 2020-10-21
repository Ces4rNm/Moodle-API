<?php

include_once '../config.php';
include_once '../utils.php';

$dbConn = connect($db);    
    $sql = $dbConn->prepare("SELECT rol, ID_usuario FROM usuario WHERE correo = :correo and password = :password");
    $sql->bindValue(':correo', $_POST['correo']);
    $sql->bindValue(':password', $_POST['password']);
    $sql->execute();
    header("HTTP/1.1 200 OK");
    echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
    exit();

    header("HTTP/1.1 400 Bad Request");
?>