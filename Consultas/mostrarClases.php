<?php

    include_once '../config.php';
    include_once '../utils.php';

    $dbConn = connect($db);

    $sql = $dbConn->prepare("SELECT a.nombre, b.cod_clase, b.descripcion, b.asistencia_profesor, c.nombre as asignatura, c.n_creditos FROM Usuario a, Clase b, Asignatura c WHERE a.ID_usuario=b.ID_docente and b.cod_asignatura=c.cod_asignatura");
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    $res = $sql->fetchAll();
    if ($res) {
        echo '{"code":"0", "msg":"done", "data":'.json_encode(json_encode($res)).'}';
    } else {
        echo '{"code":"1", "msg":"No se encontraron docentes", "data":'.json_encode(json_encode($res)).'}';
    }  
    exit();

?>