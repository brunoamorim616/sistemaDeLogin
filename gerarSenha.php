<?php
    require_once 'configDB.php';
    $msg = "";
    if(isset($_GET['email']) && isset($_GET['token'])){
        $email = $_GET['email'];
        $token = $_GET['token'];
        
        $sql = $conexão->prepare("SELECT * FROM usuario WHERE email = ? AND token = ? AND tokend = ?> now()");
        $sql->bind_param("sss", $email, $token, $tokend);
        $sql->execute();
        $resultado = $sql->get_result();
        if($resultado->num_rows > 0){
            if(isset($_POST['gerar'])){
                $novaSenha = sha1($_POST['senha']);
                $confirmarSenha = sha1($_POST['csenha']);
                if($novaSenha == $confirmarSenha){
                    $sql = $conexão->prepare("UPDATE usuario SET token = '', senha = '' WHERE email = ?");
                    $sql->bind_param("ss", $novaSenha, $email);
                    $sql->execute();
                    $msg = "<em class='text-sucess'>Senha Alterada com Sucesso!</em>";
                }else {
                    $msg = "<em class='text-danger'>Senhas não Conferem</em>";
                }
            }
        }
    }else {
        header("location:index.php");
        exit();
    }
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Gerar nova Senha</title>
  </head>
  <body>
      <main class="container">
          <section class="row justify-content-center">
              <div class="col-lg-5 mt-5">
                  <h3 class="text-center bg-dark text-light p-2 rounded">
                      Gerar Nova Senha
                  </h3>
                  <h4 class="text-center text-info">
                      <?= @$msg ?>
                  </h4>
                  <form method="post">
                      <div class="from-group">
                          <label for="senha">Nova Senha</label>
                          <br>
                          <input calss="form-control" placeholder="Nova Senha" required type="password" name="senha" id="senha">
                      </div>
                      <div class="from-group">
                          <label for="csenha">Confirmar Senha</label>
                          <br>
                          <input calss="form-control" placeholder="Confirmar Senha" required type="password" name="csenha" id="csenha">
                      </div>
                      <div class="from-group">
                          <input class="btn btn-block btn-primary" type="submit" value="Confirmar" name="gerar">
                      </div>
                  </form>
              </div>
          </section>
      </main>

      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>