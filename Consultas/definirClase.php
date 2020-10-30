<?php

    include_once '../config.php';
    include_once '../utils.php';

    $dbConn = connect($db);

    $input = $_POST;
    $sql = "INSERT INTO clase (ID_docente, cod_asignatura, descripcion, asistencia_profesor, estado) VALUES (:ID_docente, :cod_asignatura, :descripcion, :asistencia_profesor, :estado)";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();

    header("HTTP/1.1 200 OK");
    if($postId) {
        $input['ID_clase'] = $postId;
        echo '{"code":"0", "msg":"done", "data":'.json_encode(json_encode($input)).'}';
    } else {
        echo '{"code":"-1", "msg":"No se pudo definir la clase", "data":'.json_encode(json_encode($input)).'}';
    }
    exit();
    
?>