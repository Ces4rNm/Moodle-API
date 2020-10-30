<?php

    include_once '../config.php';
    include_once '../utils.php';

    $dbConn = connect($db);

    //Mostrar horarios
    $sql = $dbConn->prepare("SELECT b.dia_semana, b.hora, c.nombre FROM Usuario a, Horario b, Asignatura c WHERE a.ID_usuario=b.ID_docente and b.cod_asignatura=c.cod_asignatura and a.ID_usuario=:ID_usuario");
    $sql->bindValue(':ID_usuario', $_POST['ID_usuario']);
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    $res = $sql->fetchAll();
    if ($res) {
        echo '{"code":"0", "msg":"done", "data":'.json_encode(json_encode($res)).'}';
    } else {
        echo '{"code":"1", "msg":"No se encontraron horarios", "data":'.json_encode(json_encode($res)).'}';
    }  
    exit();

?>