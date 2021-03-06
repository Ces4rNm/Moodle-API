<?php

    include_once '../config.php';
    include_once '../utils.php';

    $dbConn = connect($db);

    $input = $_POST;
    $sql = "INSERT INTO horario (ID_docente, cod_asignatura, semestre, dia_semana, hora, salon) VALUES (:ID_docente, :cod_asignatura, :semestre, :dia_semana, :hora, :salon)";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();

    header("HTTP/1.1 200 OK");
    if($postId==0) {
        echo '{"code":"0", "msg":"done", "data":'.json_encode(json_encode($input)).'}';
    } else {
        echo '{"code":"-1", "msg":"No se pudo crear el horario", "data":'.json_encode(json_encode($input)).'}';
    }
    exit();
    
?>