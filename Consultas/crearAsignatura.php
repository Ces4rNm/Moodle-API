<?php

    include_once '../config.php';
    include_once '../utils.php';

    $dbConn = connect($db);

    $input = $_POST;
    $sql = "INSERT INTO asignatura (nombre, n_creditos) VALUES (:nombre, :n_creditos)";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();

    if($postId){
        $input['cod_asignatura'] = $postId;
        header("HTTP/1.1 200 OK");
        echo json_encode($input);
        exit();
	}
    
?>