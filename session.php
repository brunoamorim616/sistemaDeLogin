<?php
session_start();
require_once 'configDB.php';
if (isset($_SESSION['nomeUsuario'])){
    $usuario = $_SESSION["nomeUsuario"];
    echo "Nome do usuário $usuario";
} else {
    haeder("location: index.php");
}
