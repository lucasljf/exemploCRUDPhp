<?php
    require_once "../model/aluno.php";
    require_once "../model/alunoDao.php";
    require_once "../model/situacaoDao.php";
    require_once "../db/conexao.php";

    $conexao = new Conexao();

    $situacaoDao = new SituacaoDao($conexao);
    $alunoDao = new AlunoDao($conexao);

    $situacao = $situacaoDao->pesquisarNome('Cursando');
    
    $aluno = new Aluno($situacao, $_POST['nome']);
    $alunoDao->inserir($aluno);

    header('Location: listaAlunos.php');
?>