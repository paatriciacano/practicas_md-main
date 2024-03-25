<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/practicas/conexion.php' );
    
if(isset($_POST['grabacioncliente'])){
    echo "holaaaa";
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $telefono=$_POST['telefono'];
    $correo=$_POST['correo'];
    $observaciones=$_POST['observaciones'];
    $entidad=$_POST['entidad'];
    $tipo=$_POST['radios-example'];

    $sql = "INSERT INTO clientes (nombre, apellido, telefono, observaciones, correo, entidad, tipo)  VALUES (:nombre, :apellidos, :telefono, :observaciones, :correo, :entidad, :tipo)";

    $query = $dbh->prepare($sql);
    $query->bindValue(":nombre", $nombre);
    $query->bindValue(":apellidos", $apellidos);
    $query->bindValue(":telefono", $telefono);
    $query->bindValue(":observaciones", $observaciones);
    $query->bindValue(":correo", $correo);     
    $query->bindValue(":entidad", $entidad);
    $query->bindValue(":tipo", $tipo);

    try {
        $result = $query->execute();
      } catch(PDOException $e) {
        echo $e->getCode() . " - " . $e->getMessage();
         header("Location:ejemplo1.php");
         echo "error";
      }
      if($result) {
        echo "correcto";
        header("Location:ejemplo1.php");
      } else {
        echo "no graba";
      }
}
