<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Alunos</title>
</head>
<body>
    <h4>Lista de Alunos</h4>
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Situação</th>
            <th>Nome</th>
            <th>Data de cadastro</th>
            <th>Nova Turma</th>
            <th>Editar nome</th>
            <th>Deletar aluno</th>
        </tr>
        <?php
            require_once "../model/alunoDao.php";
            require_once "../db/conexao.php";

            $conexao = new Conexao();
            $alunoDao = new AlunoDao($conexao);
            $alunos = $alunoDao->listarTudo();
            
            foreach ($alunos as $key => $aluno) {
                echo "<tr>";
                echo "<td>" . $aluno->__get('id') . "</td>";
                echo "<td>" . $aluno->__get('situacao')->__get('nome') . "</td>";
                echo "<td>" . $aluno->__get('nome') . "</td>";
                echo "<td>" . $aluno->__get('dataCadastro') . "</td>";
            ?>
                <td><a href="criarTurma.php?id=<?= $aluno->__get('id')?>">Adicionar turma</a></td>
                <td><a href="adicionarAluno.php?id=<?= $aluno->__get('id')?>">Alterar nome</a></td>
                <td><a href="deletarAluno.php?id=<?= $aluno->__get('id')?>">Deletar aluno</a></td>
            <?php
                echo "</tr>";
            }
        ?>
    </table>
    <br>
    <a href="adicionarAluno.php">Adicionar novo aluno...</a>
</body>
</html>