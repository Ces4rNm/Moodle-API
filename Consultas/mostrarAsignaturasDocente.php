<?php

    include_once '../config.php';
    include_once '../utils.php';

    $dbConn = connect($db);

    //Mostrar horarios
    $sql = $dbConn->prepare("SELECT b.hora, b.salon, c.nombre, c.cod_asignatura FROM Usuario a, Horario b, Asignatura c WHERE a.ID_usuario=b.ID_docente and b.cod_asignatura=c.cod_asignatura and a.ID_usuario=:ID_usuario and b.dia_semana=:dia_semana and b.semestre = :semestre");
    $sql->bindValue(':ID_usuario', $_POST['ID_usuario']);
    $sql->bindValue(':dia_semana', $_POST['dia_semana']);
    $sql->bindValue(':semestre', $_POST['semestre']);
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    echo json_encode( $sql->fetchAll()  );
    exit();

?>