<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar aluno</title>
</head>
<body>
    <?php
        require_once "../db/conexao.php";
        require_once "../model/alunoDao.php";

        if (!isset($_GET['id'])) {
            // novo aluno
            $nome = "";
            $acao = "inserirAluno.php";
        } else {
            // alterar aluno
            $conexao = new Conexao();
            $alunoDao = new AlunoDao($conexao);
            $aluno = $alunoDao->pesquisarId($_GET['id']);
            $nome = $aluno->__get('nome');
            $acao = "alterarAluno.php?id=" . $aluno->__get('id');
        }
    ?>

    <form action="<?= $acao;?>" method="post">
        Nome: <br>
        <input type="text" name="nome" value="<?= $nome; ?>"> <br><br>

        <input type="submit" value="Salvar">
    </form>
</body>
</html>