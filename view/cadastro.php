<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <!-- CSS do Bootstrap e CSS customizado -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script type='text/javascript' src='//code.jquery.com/jquery-compat-git.js'></script>
    <script type='text/javascript' src='//igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js'></script>
</head>

<body>

    <?php
    // Inicia a Session
    session_start();

    // Inclui o menu
    include_once("include/menu.php");
    ?>

    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-lg-4">
                <h3>Cadastro de contato</h3>

                <form action="../controller/contatoController.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira seu nome">
                    </div>
                    <div class="form-group">
                        <label for="nome">Sobrenome</label>
                        <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Insira seu sobrenome">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Insira seu e-mail">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="Insira uma senha">
                        <img id="olho" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABDUlEQVQ4jd2SvW3DMBBGbwQVKlyo4BGC4FKFS4+TATKCNxAggkeoSpHSRQbwAB7AA7hQoUKFLH6E2qQQHfgHdpo0yQHX8T3exyPR/ytlQ8kOhgV7FvSx9+xglA3lM3DBgh0LPn/onbJhcQ0bv2SHlgVgQa/suFHVkCg7bm5gzB2OyvjlDFdDcoa19etZMN8Qp7oUDPEM2KFV1ZAQO2zPMBERO7Ra4JQNpRa4K4FDS0R0IdneCbQLb4/zh/c7QdH4NL40tPXrovFpjHQr6PJ6yr5hQV80PiUiIm1OKxZ0LICS8TWvpyyOf2DBQQtcXk8Zi3+JcKfNafVsjZ0WfGgJlZZQxZjdwzX+ykf6u/UF0Fwo5Apfcq8AAAAASUVORK5CYII=" />
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control phone" name="telefone" id="telefone" placeholder="Insira seu telefone">
                    </div>
                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="number" class="form-control" name="cep" id="cep" placeholder="Insira seu CEP">
                    </div>
                    <button type="button" class="btn btn-light" onclick="buscarCEP()">Buscar</button>
                    <div class="form-group">
                        <label for="logradouro">Logradouro</label>
                        <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Insira seu logradouro">
                    </div>
                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Insira seu bairro">
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Insira sua cidade">
                    </div>
                    <div class="form-group">
                        <label for="uf">UF</label>
                        <input type="text" class="form-control" name="uf" id="uf" placeholder="Insira o UF">
                    </div>
                    <button class="btn btn-primary">Cadastrar</button>
                </form>
                <div id="status"></div>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <!-- Busca CEP -->
    <script>
        function buscarCEP() {
            var cep = $("#cep").val();
            var endereco = "http://viacep.com.br/ws/" + cep + "/json/";
            $.getJSON(endereco, function(result) {
                $("#logradouro").val(result.logradouro);
                $("#bairro").val(result.bairro);
                $("#cidade").val(result.localidade);
                $("#uf").val(result.uf);
            }).fail(function() {
                alert("Falha ao consultar o CEP!");
            });
        }
    </script>

    <!-- Mascara para telefone -->
    <script>
        var behavior = function(val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            options = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(behavior.apply({}, arguments), options);
                }
            };

        $('.phone').mask(behavior, options);
    </script>

    <!-- Ver senha com o "olho" -->
    <script>
        var senha = $('#senha');
        var olho = $("#olho");

        olho.mousedown(function() {
            senha.attr("type", "text");
        });

        olho.mouseup(function() {
            senha.attr("type", "password");
        });
        // para evitar o problema de arrastar a imagem e a senha continuar exposta, 
        //citada pelo nosso amigo nos comentários
        $("#olho").mouseout(function() {
            $("#senha").attr("type", "password");
        });
    </script>

    <!-- JQuery Online -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <!-- Arquivos do CDN Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- JS do Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JS customizado -->
    <script src="js/scripts.js"></script>
</body>

</html>