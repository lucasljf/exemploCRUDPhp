<?php
    class Conexao {
        private $host = 'db'; //para xampp ou instalação separada, substituir por 'localhost'
        private $db = 'projetoAlunos';
        private $usuario = 'root';
        private $senha = '123456789'; //altere a senha de acordo com seu ambiente de desenvolvimento

        public function conectar() {
            try {
                $conexao = new PDO(
                    "mysql:host=$this->host;dbname=$this->db",
                    "$this->usuario", "$this->senha"
                );
                return $conexao;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>