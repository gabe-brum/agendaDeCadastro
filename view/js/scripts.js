// Login
function efetuarLogin(){
    dados = {
        'email': $('#email').val(),
        'senha': $('#senha').val(),
        'login': $('#login').val()
    }

    $.ajax({
        url: '../controller/contatoController.php',
        type: 'post',
        data: dados,
        success: function(){
            // Redireciona para o index depois do delay
            setTimeout(function(){
                window.location.href = "../index.php"
            }, 2000) // tempo em milisegundos
        }

    });
}

// Logout
function efetuarLogout(){
    dados = {
        'logout': $('#logout').val()
    }

    $.ajax({
        url: '../controller/contatoController.php',
        type: 'post',
        data: dados,
        success: function(){
            // Redireciona para o index depois do delay
            setTimeout(function(){
                window.location.href = "../index.php"
            }, 2000) // tempo em milisegundos
        }

    });
}