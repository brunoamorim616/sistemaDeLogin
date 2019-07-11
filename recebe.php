<?php
//Importanto as confgs do DB
require_once 'configDB.php';

//Limpando os dados de entrada POST
function verificar_entrada($entrada){
    $saida = trim($entrada);//Remove espaços antes e depois
    $saida = htmlspecialchars($saida);//Remove caracteres HTML
    $saida = stripcslashes($saida);//Remove Barras
    return $saida;
}

if(isset($_POST['action']) && $_POST['action'] == 'registro'){
    $nomeCompleto = verificar_entrada($_POST['nomeCompleto']);
    $nomeUsuario = verificar_entrada($_POST['nomeUsuario']);
    $emailUsuario = verificar_entrada($_POST['emailUsuario']);
    $senhaUsuario = verificar_entrada($_POST['senhaUsuario']);
    $senhaUsuarioConfirmar = verificar_entrada($_POST['senhaUsuarioConfirmar']);
    $criado = date("Y-m-d");//Cria data Ano-Mês-Dia
    
    //Gerar Hash
    $senha = md5($senhaUsuario);
    $senhaConfirmar = md5($senhaUsuarioConfirmar);
    
    //Back-end
    if($senha != $senhaConfirmar){
        echo "as senhas não conferem";
        exit();
    }else{
        //Verificando no banco de Dados
        //PARA EVITAR SQL INJECTION
        $sql = $conexão->prepare("SELECT nomeUsuario, email FROM usuario WHERE nomeUsuario = ? OR email = ?");
        $sql->bind_param("ss", $nomeUsuario, $emailUsuario);
        
        $sql->execute();//MÉTODO DO OBJETO $sql
        $resultado = $sql->get_result();//TABELA DO BANCO
        $linha = $resultado->fetch_array(MYSQLI_ASSOC);
        
        if($linha['nomeUsuario'] == $nomeUsuario){
            echo "Nome de usuário: {$nomeUsuario} indisponível";
        }else if($linha["email"] == $emailUsuario){
            echo "Email {$emailUsuario} já cadastrado";
        }else{
            //Inserindo no banco de dados
            $sql = $conexão->prepare("INSERT INTO usuario (nome, nomeUsuario, email, senha, criado) VALUES( ?, ?, ?, ?, ?);");
            $sql->bind_param("sssss", $nomeCompleto, $nomeUsuario, $emailUsuario, $senha, $criado);
            
            if($sql->execute()){
                echo "Usuário cadastrado";
                exit();
            }else{
                echo "Algo deu errado";
                exit();
            }
        }
    }
}