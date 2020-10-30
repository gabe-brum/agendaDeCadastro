<?php
class ContatoService
{
    public function efetuarLogin($contato)
    {
        // Verifica se o campo e-mail foi preenchido
        if(strcmp($contato->email, "") == 0){
            $response = array(
                "mensagem" => "Preencha o campo E-mail",
                "campo" => "#email",
                "sucesso" => false
            );
            return $response;
        }

        // Verifica se o campo senha foi preenchido
        if(strcmp($contato->senha, "") == 0){
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
        if($resultado =! null){
            //Recebe os valores vindos do DB
            $emailDB = $resultado['email'];
            $senhaDB = $resultado['senha'];

            // Converte senha para MD5

            // Compara o valor informado com o valor do DB
            if(strcmp($contato->email, $emailDB) == 0 && strcmp($contato->senha, $senhaDB)){
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

        $resultado = $dao->buscarContatoDAO($contato);
        return $resultado;
    }
}