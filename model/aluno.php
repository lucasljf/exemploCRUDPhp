<?php
    class Aluno {
        private $id;
        private $situacao;
        private $nome;
        private $dataCadastro;

        public function __construct($situacao, $nome) {
            $this->situacao = $situacao;
            $this->nome = $nome;
        }

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }
    }
?>