<?php

    include_once '../config.php';
    include_once '../utils.php';

    $dbConn = connect($db);

    $input = $_POST;
    $sql = "INSERT INTO usuario (correo, edad, estudios, facultad, fecha_registro, nombre, password, rol, sexo) VALUES (:correo, :edad, :estudios, :facultad, :fecha_registro, :nombre, :password, :rol, :sexo)";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();

    if($postId){
        $input['ID_usuario'] = $postId;
        header("HTTP/1.1 200 OK");
        echo json_encode($input);
        exit();
	}
    
?>