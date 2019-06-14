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

        public function listarTudo() {
            $sql = 'SELECT * FROM aluno';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_OBJ); // array de aluno?
            $alunos = array();

            $conexao = new Conexao();
            $situacaoDao = new SituacaoDao($conexao);
            foreach ($resultados as $id => $objeto) {
                $situacao = $situacaoDao->pesquisarId($objeto->idSituacao);
                $aluno = new Aluno($situacao, $objeto->nome);
                $aluno->__set('id', $objeto->id);
                $aluno->__set('dataCadastro', $objeto->dataCadastro);
                $alunos[] = $aluno;
            }
            return $alunos;
        }
    }
?>