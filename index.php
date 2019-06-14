<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body class="bg-dark">
<main class="container mt-4">
    <!-- Alerta -->
    <section class="row">
        <div class="col-lg-4 offset-lg-4" id="alerta">
            <div class="alert alert-success text-center">
                <strong id="resultado">
                    Sistema de LOGIN
                </strong>
            </div>
        </div>
    </section>
    <!-- Formulário de Login -->
    <section class="row">
        <div class="col-lg-4 offset-lg-4 bg-light rounded" id="caixaLogin">
            <H2 class="text-center mt-2">
                LOGIN
            </H2>
            <form action="#" method="post" role="form" class="p-2" id="formLogin">
                <div class="form-group">
                    <input type="text" name="nomeUsuario" class="form-control" placeholder="Nome do Usuário" required minlength="5">
                </div>
                <div class="form-group">
                    <input type="password" name="senhaUsuario" class="form-control" placeholder="Senha do Usuário" required minlength="10">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="lembrar" id="checkLembrar" class="custom-control-input">
                        <label for="checkLembrar" class="custom-control-label">
                            Lembrar de mim.
                        </label>
                        <a href="#" id="btnEsqueci" class="float-right">
                            Esqueci a Senha.
                        </a>

                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="btnEntrar" id="btnEntrar" value="Login" class="btn btn-primary btn-block">
                </div>
                <div class="form-group">
                    Ou registre-se
                    <a href="#" id="btnRegistrar">
                        aqui.
                    </a>
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