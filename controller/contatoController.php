<?php
// Inicia a Session
session_start();

if (isset($_POST['logout'])) {
    efetuarLogout();
} else if(isset($_POST['login']))  {
    efetuarLogin();
}

/* Functions */

// Logout
function efetuarLogout()
{
    session_destroy();
}

// Login
function efetuarLogin()
{
    // Busca os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Simulado os dados vindos do BD
    $emailBD = "gabrielbrumdaluz@gmail.com";
    $senhaBD = "123";
    $idBD = "7";
    $nomeBD = "Gabriel";
    $sobrenomeBD = "Brum";

    // Verifica se o email e a senha informadas são iguais ao que tem no BD
    if (strcmp($email, $emailBD) == 0 && strcmp($senha, $senhaBD) == 0) {
        echo "SUCESSO!";

        // Coloca os dados na session
        $_SESSION['id'] = $idBD;
        $_SESSION['nome'] = $nomeBD;
        $_SESSION['sobrenome'] = $sobrenomeBD;
        $_SESSION['email'] = $emailBD;
        $_SESSION['senha'] = $senhaBD;

    } else {
        echo "E-MAIL OU SENHA INCORRETOS";
    }
}
