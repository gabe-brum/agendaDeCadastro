// Login
function efetuarLogin() {
    dados = {
        'email': $('#email').val(),
        'senha': $('#senha').val(),
        'login': $('#login').val()
    }

    $.ajax({
        url: '../controller/contatoController.php',
        type: 'post',
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
                    window.location.href = "../index.php"
                }, 2000) // tempo em milisegundos
            } else{
                $(data.campo).focus();
                $('#status').css({
                    "color": "#ff6f65"
                });
            }


        }

    });
}

// Logout
function efetuarLogout() {
    dados = {
        'logout': $('#logout').val()
    }

    $.ajax({
        url: '../controller/contatoController.php',
        type: 'post',
        data: dados,
        success: function () {
            // Redireciona para o index depois do delay
            setTimeout(function () {
                window.location.href = "../index.php"
            }, 2000) // tempo em milisegundos
        }

    });
}