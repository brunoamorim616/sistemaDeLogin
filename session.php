<?php
session_start();
require_once 'configDB.php';
if (isset($_SESSION['nomeUsuario'])){
    $usuario = $_SESSION["nomeUsuario"];
    //echo "Nome do usuário $usuario";
    $sql = $conexão -> prepare("SELECT * FROM usuario WHERE nomeUsuario = ?");
    $sql -> bind_param("s", $usuario);
    $sql -> execute();
    $resultado = $sql -> get_result();
    $linha = $resultado -> fetch_array(MYSQLI_ASSOC);
    
    $nomeUsuario = $linha["nomeusuario"];
    $nome = $linha["nome"];
    $email = $linha["email"];
    $dataCriado = $linha["criado"];
} else {
    header("location:index.php");
}
