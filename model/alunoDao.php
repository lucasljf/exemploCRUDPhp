<?php
    class AlunoDao {
        private $conexao;

        public function __construct(Conexao $conexao) {
            $this->conexao = $conexao->conectar();
        }

        public function inserir(Aluno $aluno) {
            $sql = 'INSERT INTO aluno (idSituacao, nome) VALUES (:idSituacao, :nome)';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':idSituacao', $aluno->__get('situacao')->__get('id'));
            $stmt->bindValue(':nome', $aluno->__get('nome'));
            $stmt->execute();
        }
    }
?>