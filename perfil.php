<?php
    require_once 'session.php';
    //Deve ser iserido em toda a página em que só deve ser acessada com login da sessão realizada
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Perfil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">EOQ!</a>

  <!-- Links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="#" style="color:aliceblue">ALI</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" style="color:aliceblue">AQUI</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color:aliceblue" ></a>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="#">Configurações </a>
        <a class="dropdown-item" href="sair.php">Sair</a>
        <!--<a class="dropdown-item" href="#">Link 3</a>-->
      </div>
    </li>
  </ul>
</nav>
    
<br>

<div class="jumbotron jumbotron-fluid bg-success text-center">
  <div class="container" style="color: aliceblue">
    <h1>Bem-Vindo!</h1>
  </div>
    <br>
    <br>
    <br>
    <h2 class="text-center">
        <?= $nome ?>
    </h2>
    <h2 class="text-center">
        <?= $email ?>
    </h2>
    <h2 class="text-center">
        <?= $dataCriado ?>
    </h2>
</div>

</body>
</html>
