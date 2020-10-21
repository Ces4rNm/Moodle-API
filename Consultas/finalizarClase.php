<?php

    include_once '../config.php';
    include_once '../utils.php';

    $dbConn = connect($db);

    $input = $_POST;
    $sql ="UPDATE clase SET estado = 2 WHERE cod_clase= :cod_clase";
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