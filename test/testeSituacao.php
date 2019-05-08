<?php
    require_once "../model/situacao.php";
    require_once "../model/situacaoDao.php";
    require_once "../db/conexao.php";

    $situacao = new Situacao("Exemplo");
    $conexao = new Conexao();

    $situacaoDao = new SituacaoDao($conexao);
    $situacaoDao->inserir($situacao);
?>