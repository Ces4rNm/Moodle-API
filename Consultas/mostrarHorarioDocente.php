<?php

    include_once '../config.php';
    include_once '../utils.php';

    $dbConn = connect($db);

    //Mostrar horarios
    $sql = $dbConn->prepare("SELECT b.hora, b.salon, c.nombre, c.cod_asignatura FROM Usuario a, Horario b, Asignatura c WHERE a.ID_usuario=b.ID_docente AND b.cod_asignatura=c.cod_asignatura AND a.ID_usuario=:ID_usuario and b.dia_semana=:dia and b.semestre=:semestre");
    $sql->bindValue(':ID_usuario', $_POST['ID_usuario']);
    $sql->bindValue(':dia', $_POST['dia']);
    $sql->bindValue(':semestre', $_POST['semestre']);
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    $res = $sql->fetchAll();
    if ($res) {
        echo '{"code":"0", "msg":"done", "data":'.json_encode(json_encode($res)).'}';
    } else {
        echo '{"code":"1", "msg":"No se encontraron horarios", "data":'.json_encode(json_encode($_POST)).'}';
    }  
    exit();

?>