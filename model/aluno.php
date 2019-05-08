<?php
    class Aluno {
        private $id;
        private $idSituacao;
        private $nome;
        private $dataCadastro;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }
    }
?>