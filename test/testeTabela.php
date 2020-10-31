<?php
    require_once "../model/aluno.php";
    require_once "../model/alunoDao.php";
    require_once "../model/situacao.php";
    require_once "../model/situacaoDao.php";
    require_once "../db/conexao.php";

    $conexao = new Conexao();
    $situacaoDao = new SituacaoDao($conexao);
    $alunoDao = new AlunoDao($conexao);

    $situacao = $situacaoDao->pesquisarNome('Transferido');
    $aluno = new Aluno($situacao, 'AlunoTeste1');
    
    // $alunoDao->inserir($aluno);

    $alunos = $alunoDao->listarTudo();
    // echo "<pre>";
    // print_r($alunos);
    // echo "</pre>";

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>nome</th>";
    echo "<th>situacao</th>";
    echo "</tr>";
    foreach ($alunos as $aluno) {
        echo "<tr><td>" . $aluno->__get('nome') . "</td>";
        echo "<td>" . $aluno->__get('situacao')->__get('nome') . "</td></tr>";
    }    
    echo "</table>";
?>