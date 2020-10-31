<?php

    require_once "../db/conexao.php";
    require_once "../model/alunoDao.php";

    $conexao = new Conexao();
    $alunoDao = new AlunoDao($conexao);

    $aluno = $alunoDao->pesquisarId($_GET['id']);
    $alunoDao->deletar($aluno);

    header("Location: listaAlunos.php");
?>