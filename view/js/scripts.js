// Cadastro de contato
function cadastrarContato() {
    dados = {
        'nome': $('#nome').val(),
        'sobrenome': $('#sobrenome').val(),
        'email': $('#email').val(),
        'senha': $('#senha').val(),
        'cadastrar': $('#cadastrar').val()
    };

    // Mostra o Loading
    carregarModalLoading();

    $.ajax({
        url: '../controller/contatoController.php',
        type: 'POST',
        data: dados,
        success: function (data) {

            setTimeout(function () {
                esconderModalLoading();

                // Mostra a mensagem
                $('#status').text(data.mensagem);

                // Verifica o código retornado
                if (data.codigo == 1) {

                    $('#status').css({
                        "color": "#f1c40f"
                    });
                    // Redireciona para o Cadastro depois do delay
                    setTimeout(function () {
                        window.location.href = "cadastro.php"
                    }, 2000) // tempo em milisegundos

                } else {

                    $(data.campo).focus();
                    $('#status').css({
                        "color": "#ff6f65"
                    });
                }

            }, 1000);
        }
    });
}

// Editar
function editarContato() {
    dados = {
        'nome': $('#nome').val(),
        'sobrenome': $('#sobrenome').val(),
        'email': $('#email').val(),
        'senha': $('#senha').val(),
        'editarContato': $('#editarContato').val()
    };

    // Mostra o Loading
    carregarModalLoading();

    $.ajax({
        url: '../controller/contatoController.php',
        type: 'POST',
        data: dados,
        success: function (data) {
            // Mostra a mensagem
            $('#status').text(data.mensagem);

            // Verifica o código retornado
            if (data.codigo == 1) {

                $('#status').css({
                    "color": "#f1c40f"
                });
                // Redireciona para a home depois do delay
                setTimeout(function () {
                    window.location.href = "home.php"
                }, 2000) // tempo em milisegundos

            } else {

                $(data.campo).focus();
                $('#status').css({
                    "color": "#ff6f65"
                });

                // Esconde o modal
                setTimeout(function () {
                    esconderModalLoading();
                }, 2000) // tempo em milisegundos
            }

        }

    });
}

// Login
function efetuarLogin() {
    dados = {
        'email': $('#email').val(),
        'senha': $('#senha').val(),
        'login': $('#login').val()
    };

    // Mostra o Loading
    carregarModalLoading();

    $.ajax({
        url: '../controller/contatoController.php',
        type: 'POST',
        data: dados,
        success: function (data) {
            // Mostra a mensagem
            $('#status').text(data.mensagem);

            // Verifica o código retornado
            if (data.codigo == 1) {
                $('#status').css({
                    "color": "#f1c40f"
                });
                // Redireciona para o index depois do delay
                setTimeout(function () {
                    window.location.href = "home.php"
                }, 2000) // tempo em milisegundos

            } else {
                $(data.campo).focus();
                $('#status').css({
                    "color": "#ff6f65"
                });

                // Esconde o modal
                setTimeout(function () {
                    esconderModalLoading();
                }, 2000) // tempo em milisegundos
            }
        }
    });

}

// Logout
function efetuarLogout() {
    dados = {
        'logout': $('#logout').val()
    };

    // Mostra o Loading
    carregarModalLoading();

    $.ajax({
        url: '../controller/contatoController.php',
        type: 'POST',
        data: dados,
        success: function () {
            // Redireciona para o index depois do delay
            setTimeout(function () {
                window.location.href = "home.php"
            }, 2000) // tempo em milisegundos
        }

    });
}

function carregarModalLoading() {
    $('#modalLoading').css({
        "display": "block"
    });
}

function esconderModalLoading() {
    $('#modalLoading').css({
        "display": "none"
    });
}