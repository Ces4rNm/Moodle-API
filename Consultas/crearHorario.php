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

    if($postId){
        $input['ID_docente'] = $postId;
        header("HTTP/1.1 200 OK");
        echo json_encode($input);
        exit();
	}
    
?>