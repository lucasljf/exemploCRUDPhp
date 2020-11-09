<?php
    require_once "situacaoDao.php";
    require_once "situacao.php";
    require_once "aluno.php";

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

            $aluno->__set('id', $this->conexao->lastInsertId());
            return $aluno;
        }

        public function deletar(Aluno $aluno) {
            $sql = 'DELETE FROM aluno WHERE id = :id';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $aluno->__get('id'));
            $stmt->execute();
        }

        public function alterar(Aluno $aluno) {
            $sql = 'UPDATE aluno SET nome = :nome WHERE id = :id';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $aluno->__get('nome'));
            $stmt->bindValue(':id', $aluno->__get('id'));
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
        
        public function pesquisarId($id) {
            $sql = 'SELECT * FROM aluno WHERE id = :id';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            
            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            
            $conexao = new Conexao();
            $situacaoDao = new SituacaoDao($conexao);
            
            $situacao = $situacaoDao->pesquisarId($resultado->idSituacao);
            $aluno = new Aluno($situacao, $resultado->nome);
            $aluno->__set('id', $resultado->id);
            $aluno->__set('dataCadastro', $resultado->dataCadastro);
            return $aluno;            
        }

        public function pesquisarNome($nome) {
            $sql = 'SELECT * FROM aluno WHERE nome like :nome';
            $stmt = $this->conexao->prepare($sql);
            $stmt ->bindValue(':nome', '%'. $nome . '%');
            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
            $alunos = array();

            $conexao = new Conexao();
            $situacaoDao = new SituacaoDao($conexao);
            foreach ($resultados as $resultado) {
                $situacao = $situacaoDao->pesquisarId($resultado->idSituacao);
                $aluno = new Aluno($situacao, $resultado->nome);
                $aluno->__set('id', $resultado->id);
                $aluno->__set('dataCadastro', $resultado->dataCadastro);
                $alunos[] = $aluno;
            }
            return $alunos;
        }
    }
?>