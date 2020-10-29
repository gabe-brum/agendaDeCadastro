<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS do Bootstrap e CSS customizado -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php
    include_once("include/menu.php");
    ?>

    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-lg-4">
                <h3>Login</h3>

                <form>
                    <div class="form-group">
                        <label for="nome">E-mail</label>
                        <input type="email" class="form-control" id="email" placeholder="Insira seu e-mail">
                    </div>
                    <div class="form-group">
                        <label for="nome">Senha</label>
                        <input type="password" class="form-control" id="senha" placeholder="Insira sua senha">
                    </div>
                    <button id="login" onclick="efetuarLogin()" type="button" class="btn btn-primary">Logar</button>
                </form>
                <div id="status"></div>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <!-- JQuery Online -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Arquivos do CDN Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- JS do Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JS customizado -->
    <script src="js/scripts.js"></script>
</body>

</html>