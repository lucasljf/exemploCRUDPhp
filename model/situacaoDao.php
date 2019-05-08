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
    }
?>