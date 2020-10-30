<?php
class ContatoDAO
{
    public function cadastrarContatoDAO($contato)
    {
        //
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
        //
    }   

    public function excluirContatoDAO($contato)
    {
        //
    }
}