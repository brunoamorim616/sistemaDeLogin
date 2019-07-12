<?php
session_start(); //Inicialização da sessão
//Importanto as confgs do DB
require_once 'configDB.php';

//Limpando os dados de entrada POST
function verificar_entrada($entrada) {
    $saida = trim($entrada); //Remove espaços antes e depois
    $saida = htmlspecialchars($saida); //Remove caracteres HTML
    $saida = stripcslashes($saida); //Remove Barras
    return $saida;
}

if (isset($_POST['action']) && $_POST['action'] == 'entrar') {
    $nomeusuario = verificar_entrada($_POST['nomeUsuario']);
    $senhaUsuario = verificar_entrada($_POST['senhaUsuario']);
    $senha = sha1($senhaUsuario);

    $sql = $conexão->prepare("SELECT * FROM usuario WHERE nomeusuario = ? AND senha = ?");
    $sql->bind_param("ss", $nomeusuario, $senha);
    $sql->execute();
    //Verificando se o usuário e a senha estão corretos no BANCO DE DADOS
    $busca = $sql->fetch();
    if ($busca != null) {   
        //o Usuário e senha existem no banco
        $_SESSION['nomeUsuario'] = $nomeusuario;
        echo 'ok';
        //Verificando se o check de lembrar está selecionado
        if (!empty($_POST['lembrar'])) {
            //Criando cookies para lembrar senha e usuario na sessao
            setcookie("nomeUsuario", $nomeusuario, time() + (265 * 24 * 60 * 60));
            setcookie("senhaUsuario", $senhaUsuario, time() + (265 * 24 * 60 * 60));
        } else {
            //Limpa o cookie
            if (isset($_COOKIE['nomeUsuario']))
                setcookie('nomeUsuario', '');
            if (isset($_COOKIE['senhaUsuario']))
                setcookie('senhaUsuario', '');
        }
    }else
        echo "falhou";
    
} else if (isset($_POST['action']) && $_POST['action'] == 'registro') {
    //Sanitização de entradas POST
    $nomeCompleto = verificar_entrada($_POST['nomeCompleto']);
    $nomeUsuario = verificar_entrada($_POST['nomeUsuario']);
    $emailUsuario = verificar_entrada($_POST['emailUsuario']);
    $senhaUsuario = verificar_entrada($_POST['senhaUsuario']);
    $senhaUsuarioConfirmar = verificar_entrada($_POST['senhaUsuarioConfirmar']);
    $criado = date("Y-m-d"); //Cria data Ano-Mês-Dia
    //Gerar Hash
    $senha = sha1($senhaUsuario);
    $senhaConfirmar = sha1($senhaUsuarioConfirmar);

    //Back-end
    if ($senha != $senhaConfirmar) {
        echo "as senhas não conferem";
        exit();
    } else {
        //Verificando no banco de Dados
        //PARA EVITAR SQL INJECTION
        $sql = $conexão->prepare("SELECT nomeUsuario, email FROM usuario WHERE nomeUsuario = ? OR email = ?");
        $sql->bind_param("ss", $nomeUsuario, $emailUsuario);

        $sql->execute(); //MÉTODO DO OBJETO $sql
        $resultado = $sql->get_result(); //TABELA DO BANCO
        $linha = $resultado->fetch_array(MYSQLI_ASSOC);

        if ($linha['nomeUsuario'] == $nomeUsuario) {
            echo "Nome de usuário: {$nomeUsuario} indisponível";
        } else if ($linha["email"] == $emailUsuario) {
            echo "Email {$emailUsuario} já cadastrado";
        } else {
            //Inserindo no banco de dados
            $sql = $conexão->prepare("INSERT INTO usuario (nome, nomeUsuario, email, senha, criado) VALUES( ?, ?, ?, ?, ?);");
            $sql->bind_param("sssss", $nomeCompleto, $nomeUsuario, $emailUsuario, $senha, $criado);

            if ($sql->execute()) {
                echo "Usuário cadastrado";
                exit();
            } else {
                echo "Algo deu errado";
                exit();
            }
        }
    }
} else {
    //para não acessar o aqruivo recebe.php
    //Só funciona se não houver nada impresso na tela
    header("location:index.php");
}

