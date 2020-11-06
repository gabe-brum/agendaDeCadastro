<?php
// Inicia a Session
session_start();

// 1. Cadastrar
if (isset($_POST['cadastrar'])) {
    cadastrarContato();

    // 2. Buscar
} elseif (isset($_POST['buscarContato'])) {
    buscarContato();

    // 3. Editar    
} elseif (isset($_POST['editarContato'])) {
    editarContato();

    // 4. Excluir    
} elseif (isset($_POST['excluirContato'])) {
    editarContato();

    // 5. Login    
} elseif (isset($_POST['login'])) {
    efetuarLogin();

    // 6. Logout     
} else if (isset($_POST['logout'])) {
    efetuarLogout();

    // Se não veio de nenhum clique    
} else {
    header('Location: ../view/home.php');
}

/* Functions */

// Cadastrar
function cadastrarContato()
{
    // Retorno do JSON (validação)
    header('Content-Type: application/json');

    // Inclui os arquivos (Model)
    include_once "../Model/Contato.php";
    include_once "../Model/ContatoService.php";

    // Cria o objeto das classes Contato e ContatoService
    $contato = new Contato();
    $service = new ContatoService();

    // Guarda os dados informados no formulário
    $nome  = $_POST['nome'];
    $sobrenome  = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $contato->nome  = $nome;
    $contato->sobrenome = $sobrenome;
    $contato->email = $email;
    $contato->senha = $senha;

    // Envia o objeto para efetuar o Cadastro
    $response = $service->cadastrarContato($contato);

    // Verifica o tipo de retorno
    if ($response['sucesso']) {
        // Mostra a mensagem de Sucesso
        print json_encode(array(
            'mensagem' => $response['mensagem'],
            'codigo' => 1
        ));
        exit();
    } else {
        print json_encode(array(
            'mensagem' => $response['mensagem'],
            'campo' => $response['campo'],
            'codigo' => 0
        ));
        exit();
    }
}

// Buscar
function buscarContato()
{
    //
}

// Editar
function editarContato()
{
    // Inclui os arquivos da pasta Model
    include_once "../model/Contato.php";
    include_once "../model/ContatoService.php";

    // Retorno do JSON (validação)
    header('Content-Type: application/json');

    // Busca e guarda os dados do formulário
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $novaSenha = $_POST['senha'];

    // Cria o objeto da classe Contato e ContatoService
    $contato = new Contato();
    $service = new ContatoService();

    // Busca os dados do DB
    $nomeDB = $contato->nome;
    $sobrenomeDB = $contato->sobrenome;
    $emailDB = $contato->email;
    $senhaDB = $contato->senha;

    if (!strcmp($nome, $nomeDB)) {
        $contato->nome = $nome;  
    } elseif (!strcmp($sobrenome, $sobrenomeDB)) {
        $contato->sobrenome = $sobrenome;  
    } elseif (!strcmp($email, $emailDB)) {
        $contato->email = $email;  
    } elseif (!strcmp($novaSenha, $senhaDB)) {
        $contato->senha = $novaSenha;  
    } else{
        // redirecionar pra home
    }

    // Envia o objeto para efetuar o cadastro
    $response = $service->editarContato($contato);

    // Verifica o tipo de retorno
    if ($response['sucesso']) {
        // Mostra a mensagem de Sucesso
        print json_encode(array(
            'mensagem' => $response['mensagem'],
            'codigo' => 1
        ));
        exit();

        // Mostra a mensagem de Erro
    } else {
        print json_encode(array(
            'mensagem' => $response['mensagem'],
            'campo' => $response['campo'],
            'codigo' => 0
        ));
        exit();
    }
}

// Excluir
function excluirContato()
{
    //
}


// Login
function efetuarLogin()
{
    // Inclui os arquivos da pasta Model
    include_once "../model/Contato.php";
    include_once "../model/ContatoService.php";

    // Retorno do JSON (validação)
    header('Content-Type: application/json');

    // Busca e guarda os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Cria o objeto da classe Contato e ContatoService
    $contato = new Contato();
    $service = new ContatoService();

    $contato->email = $email;
    $contato->senha = $senha;

    // Envia o objeto para efetuar o login
    $response = $service->efetuarLogin($contato);

    // Verifica o tipo de retorno
    if ($response['sucesso']) {
        $resultado = $response['resultado'];

        // Guarda os dados na Session
        $_SESSION['id'] = $resultado['id'];
        $_SESSION['email'] = $resultado['email'];
        $_SESSION['senha'] = $resultado['senha'];
        $_SESSION['nome'] = $resultado['nome'];
        $_SESSION['sobrenome'] = $resultado['sobrenome'];

        // Mostra a mensagem de Sucesso
        print json_encode(array(
            'mensagem' => $response['mensagem'],
            'codigo' => 1
        ));
        exit();

        // Mostra a mensagem de Erro
    } else {
        print json_encode(array(
            'mensagem' => $response['mensagem'],
            'campo' => $response['campo'],
            'codigo' => 0
        ));
        exit();
    }
}


// Logout
function efetuarLogout()
{
    session_destroy();
}
