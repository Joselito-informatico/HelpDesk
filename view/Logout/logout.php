<?php
    require_once("../../config/conexion.php");
    session_destroy();
    header("Location:".$ruta."index.php"); /* header("Location:".conectar::ruta()."index.php"); dá error por no ser un método estático*/
    exit();
?>