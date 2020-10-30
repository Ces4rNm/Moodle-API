<?php

    include_once '../config.php';
    include_once '../utils.php';

    $dbConn = connect($db);

    $input = $_POST;
    $sql = $dbConn->prepare("SELECT * FROM usuario WHERE ID_usuario = :ID_usuario");
    $sql->bindValue(':ID_usuario', $input['ID_usuario']);
    $sql->execute();
    $res = $sql->fetch(PDO::FETCH_ASSOC);
    if (!$res) {
        $input['fecha_registro'] = date("Y-m-d");
        $sql = "INSERT INTO usuario (ID_usuario, correo, edad, estudios, facultad, fecha_registro, nombre, password, rol, sexo) VALUES (:ID_usuario, :correo, :edad, :estudios, :facultad, :fecha_registro, :nombre, :password, :rol, :sexo)";
        $statement = $dbConn->prepare($sql);
        bindAllValues($statement, $input);
        $statement->execute();
        $postId = $dbConn->lastInsertId();
    
        header("HTTP/1.1 200 OK");
        if($postId==0) {
            echo '{"code":"0", "msg":"done", "data":'.json_encode(json_encode($input)).'}';
        } else {
            echo '{"code":"-1", "msg":"No se pudo crear el usuario", "data":'.json_encode(json_encode($input)).'}';
        }
    }else {
        echo '{"code":"-2", "msg":"El documento ya esta registrado", "data":'.json_encode(json_encode($input)).'}';
    }
    exit();
    
?>