<?php
class ContatoDAO
{
    public function cadastrarContatoDAO($contato)
    {
        // Inclui o arquivo da classe ConexaoDB
        require_once "ConexaoDB.php";

        // Cria o objeto da classe ConexaoDB
        $db = new ConexaoDB();

        // Abre a conexão com o DB
        $conexao = $db->abrirConexaoDB();

        // Monta a query (busca)
        $sql = "INSERT INTO contato 
        (
            nome, sobrenome, email, senha
        )
        VALUES
        (
            ?,?,?,?
        )";

        // Cria o Prepared Statement
        $stmt = $conexao->prepare($sql);

        // Vincula o parâmetro que será cadastrado
        $stmt->bind_param("ssss", $nome, $sobrenome, $email, $senha);

        // Recebe os valores que foram guardados no objeto
        $nome = $contato->nome;
        $sobrenome = $contato->sobrenome;
        $email = $contato->email;
        $senha = $contato->senha;

        // Executa o Statement
        $stmt->execute();

        // Fecha o Statement e a Conexão
        $stmt->close();
        $db->fecharConexaoDB($conexao);
    }

    public function buscarContatoDAO($contato)
    {
        // Inclui o arquivo da classe ConexaoDB
        require_once "ConexaoDB.php";

        // Cria o objeto da classe ConexaoDB
        $db = new ConexaoDB();

        // Abre a conexão com o DB
        $conexao = $db->abrirConexaoDB();

        // Monta a query (busca)
        $sql = "SELECT * FROM contato WHERE email = ?";

        // Cria o Prepared Statement
        $stmt = $conexao->prepare($sql);

        // Vincula o parâmetro que será buscado
        $stmt->bind_param("s", $email);

        // Recebe o e-mail guardado no objeto
        $email = $contato->email;

        // Executa o Statement
        $stmt->execute();

        // Guarda o resultado encontrado
        $resultado = $stmt->get_result()->fetch_assoc();

        // Fecha o Statement e a Conexão
        $stmt->close();
        $db->fecharConexaoDB($conexao);

        return $resultado;
    }

    public function editarContatoDAO($contato)
    {
        // Inclui o arquivo da classe ConexaoDB
        require_once "ConexaoDB.php";

        // Cria o objeto da classe ConexaoDB
        $db = new ConexaoDB();

        // Abre a conexão com o DB
        $conexao = $db->abrirConexaoDB();

        // Monta a query (update)
        $sql = "UPDATE
                    contato
                SET
                    nome = ?,
                    sobrenome = ?,
                    email = ?,
                    senha = ?
                WHERE
                    id = ?";

        // Cria o Prepared Statement
        $stmt = $conexao->prepare($sql);

        $stmt->bind_param(
            "ssssi",
            $nome,
            $sobrenome,
            $email,
            $senha,
            $id
        );

        // Guarda os valores no objeto
        $nome = $contato->nome;
        $sobrenome = $contato->sobrenome;
        $email = $contato->email;
        $senha = $contato->senha;

        // Executa o Statement
        $stmt->execute();

        // Guarda o resultado encontrado
        $resultado = $stmt->get_result()->fetch_assoc();

        // Fecha o Statement e a Conexão
        $stmt->close();
        $db->fecharConexaoDB($conexao);

        return $resultado;
    }

    public function excluirContatoDAO($contato)
    {
        //
    }
}
