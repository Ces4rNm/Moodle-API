<?php

    include_once '../config.php';
    include_once '../utils.php';

    $dbConn = connect($db);

    $sql = $dbConn->prepare("SELECT cod_asignatura, nombre, n_creditos FROM asignatura");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      $res = $sql->fetchAll();
      if ($res) {
        echo '{"code":"0", "msg":"done", "data":'.json_encode(json_encode($res)).'}';
    } else {
        echo '{"code":"1", "msg":"No se encontraron asignaturas", "data":'.json_encode(json_encode($res)).'}';
    }
      exit();
    
?>