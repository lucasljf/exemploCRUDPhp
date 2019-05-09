<?php
    require_once "../model/situacao.php";
    require_once "../model/situacaoDao.php";
    require_once "../db/conexao.php";

    $conexao = new Conexao();
    $situacaoDao = new SituacaoDao($conexao);

    // $situacao = new Situacao("Exemplo");
    // $situacaoDao->inserir($situacao);
    $situacao = $situacaoDao->pesquisarNome('Transferido');
    print_r($situacao);
?>