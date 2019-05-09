<?php
    class SituacaoDao {
        private $conexao;
        
        public function __construct(Conexao $conexao) {
            $this->conexao = $conexao->conectar();
        }

        public function inserir(Situacao $situacao) {
            $sql = 'INSERT INTO situacao (nome) VALUES (:nome)';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $situacao->__get('nome'));
            $stmt->execute();
        }

        // public function pesquisarNome($nome) : Situacao { //tipo de retorno
        public function pesquisarNome($nome) {
            $sql = 'SELECT * FROM situacao WHERE nome = :nome';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            $situacao = new Situacao($resultado->nome);
            $situacao->__set('id', $resultado->id);
            return $situacao;
        }
    }
?>