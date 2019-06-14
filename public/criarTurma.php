<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar Turma</title>
</head>
<body>
    <?php
        if (!isset($_GET['id'])) {
    ?>
        <h4>Selecione um aluno para adicionar a essa nova turma</h4>
        <a href="listaAlunos.php">Selecionar aluno</a>
    <?php
        }
        else {
            require_once "../db/conexao.php";
            require_once "../model/alunoDao.php";

            $conexao = new Conexao();
            $alunoDao = new AlunoDao($conexao);
            $aluno = $alunoDao->pesquisarId($_GET['id']);
    ?>
    ID: <?= $aluno->__get('id') ?><br>
    Nome: <?= $aluno->__get('nome') ?><br>
    Situação: <?= $aluno->__get('situacao')->__get('nome') ?><br>
    Cadastrado em: <?= $aluno->__get('dataCadastro') ?><br>
    <?php
        }
    ?>
</body>
</html>