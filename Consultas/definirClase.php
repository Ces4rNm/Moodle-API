<?php

    include_once '../config.php';
    include_once '../utils.php';

    $dbConn = connect($db);

    $input = $_POST;
    $sql = "INSERT INTO clase (ID_docente, cod_asignatura, descripcion, asistencia_profesor, estado) VALUES (:ID_docente, :cod_asignatura, :descripcion, :asistencia_profesor, 0)";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();

    if($postId){
        $input['cod_clase'] = $postId;
        header("HTTP/1.1 200 OK");
        echo json_encode($input);
        exit();
	}
    
?>