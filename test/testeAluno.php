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
    
    $alunoDao->inserir($aluno);

    $alunos = $alunoDao->listarTudo();
    echo "<pre>";
    print_r($alunos);
    echo "</pre>";
?>