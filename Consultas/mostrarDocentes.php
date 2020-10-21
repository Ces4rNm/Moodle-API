<?php

    include_once '../config.php';
    include_once '../utils.php';

    $dbConn = connect($db);

    //Mostrar lista de post
    $sql = $dbConn->prepare("SELECT ID_usuario, nombre, facultad FROM usuario WHERE rol=2");
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    echo json_encode( $sql->fetchAll()  );
    exit();

?>