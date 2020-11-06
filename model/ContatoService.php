<?php
class ContatoService
{
    public function cadastrarContato($contato)
    {

        // Verifica se o campo nome foi preenchido
        if (strcmp($contato->nome, "") == 0) {
            $response = array(
                "mensagem" => "Preencha o campo Nome",
                "campo" => "#nome",
                "sucesso" => false
            );
            return $response;
        }

        // Verifica se o campo sobrenome foi preenchido
        if (strcmp($contato->sobrenome, "") == 0) {
            $response = array(
                "mensagem" => "Preencha o campo Sobrenome",
                "campo" => "#sobrenome",
                "sucesso" => false
            );
            return $response;
        }

        // Verifica se o campo e-mail foi preenchido
        if (strcmp($contato->email, "") == 0) {
            $response = array(
                "mensagem" => "Preencha o campo E-mail",
                "campo" => "#email",
                "sucesso" => false
            );
            return $response;
        }

        // Verifica se o campo senha foi preenchido
        if (strcmp($contato->senha, "") == 0) {
            $response = array(
                "mensagem" => "Preencha o campo Senha",
                "campo" => "#senha",
                "sucesso" => false
            );
            return $response;
        }

        /* Validação de e-mail já em uso */

        // Busca o Contato pelo e-mail informado
        $resultado = $this->buscarContato($contato);

        // Se houver resultado na busca
        if ($resultado != null) {

            $response = array(
                "mensagem" => "Este e-mail já está em uso!",
                "campo" => "#email",
                "sucesso" => false
            );

            return $response;
        } else {

            // Criptografia de senha
            $contato->senha = $this->criptografarSHA256($contato->senha);

            // Inclui o arquivo ContatoDAO
            include_once "ContatoDAO.php";

            // Cria o objeto da classe ContatoDAO
            $dao = new ContatoDAO();

            $dao->cadastrarContatoDAO($contato);

            return array(
                "mensagem" => "Cadastro efetuado com sucesso!",
                "sucesso" => true
            );
        }
    }

    public function editarContato($contato)
    {
        // Busca o Contato pelo e-mail informado
        $resultado = $this->buscarContato($contato);

        // Se houver resultado na busca
        if ($resultado != null) {

            // Criptografia de senha
            $contato->senha = $this->criptografarSHA256($contato->senha);

            // Inclui o arquivo ContatoDAO
            include_once "ContatoDAO.php";

            // Cria o objeto da classe ContatoDAO
            $dao = new ContatoDAO();

            $dao->editarContatoDAO($contato);

            return array(
                "mensagem" => "Contato editado com sucesso!",
                "sucesso" => true
            );

        } else {

            $response = array(
                "mensagem" => "Não foi possível editar!",
                //"campo" => "#email",
                "sucesso" => false
            );
        }

        return $response;
    }


    public function efetuarLogin($contato)
    {
        // Verifica se o campo e-mail foi preenchido
        if (strcmp($contato->email, "") == 0) {
            $response = array(
                "mensagem" => "Preencha o campo E-mail",
                "campo" => "#email",
                "sucesso" => false
            );
            return $response;
        }

        // Verifica se o campo senha foi preenchido
        if (strcmp($contato->senha, "") == 0) {
            $response = array(
                "mensagem" => "Preencha o campo Senha",
                "campo" => "#senha",
                "sucesso" => false
            );
            return $response;
        }

        // Busca o Contato pelo e-mail informado
        $resultado = $this->buscarContato($contato);

        // Se houver resultado na busca
        if ($resultado != null) {
            //Recebe os valores vindos do DB
            $emailDB = $resultado['email'];
            $senhaDB = $resultado['senha'];

            // Converte senha para MD5
            $contato->senha = $this->criptografarSHA256($contato->senha);

            // Compara o valor informado com o valor do DB
            if (strcmp($contato->email, $emailDB) == 0 && strcmp($contato->senha, $senhaDB) == 0) {
                $response = array(
                    "mensagem" => "Login efetuado com sucesso!",
                    "resultado" => $resultado,
                    "sucesso" => true
                );

                return $response;
            }
        }

        // Se não houver resultado na busca
        $response = array(
            "mensagem" => "E-mail ou Senha inválidos!",
            "campo" => "",
            "sucesso" => false
        );

        return $response;
    }


    private function buscarContato($contato)
    {
        // Inclui o arquivo ContatoDAO
        include_once "ContatoDAO.php";

        // Cria o objeto da classe ContatoDAO
        $dao = new ContatoDAO();

        return $dao->buscarContatoDAO($contato);
    }

    private function criptografarSHA256($valor)
    {
        $senha = hash('sha256', $valor);
        $salt = hash('sha256', 'escolaQI');
        $senha = hash('sha256', $senha . $salt); // Mistura o sal e criptografa*/

        return $valor;
    }
}
