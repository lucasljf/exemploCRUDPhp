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
    
    // atribuição após inserção no BD
    $aluno = $alunoDao->inserir($aluno);
    echo "<pre>";
    print_r($aluno);
    echo "</pre>";

    // $alunos = $alunoDao->listarTudo();
    // echo "<pre>";
    // print_r($alunos);
    // echo "</pre>";
    
    $alunoTeste = $alunoDao->pesquisarId(4);
    echo "<pre>";
    print_r($alunoTeste);
    echo "</pre>";
    
    // essa linha deleta (do BD) o aluno pesquisado anteriormente
    $alunoDao->deletar($alunoTeste);
    
    $alunoAlt = $alunoDao->pesquisarId(3);
    echo "<pre>";
    print_r($alunoAlt);
    echo "</pre>";
    
    // Define um novo valor para o atributo NOME do aluno pesquisado antes.
    $alunoAlt->__set('nome', 'NomeAlterado');

    // Executa o método que fará a alteração dos dados do aluno no BD
    $alunoDao->alterar($alunoAlt);

    // Pesquisa e impressão dos dados novamente, para exibir a alteração.
    $alunoAlt = $alunoDao->pesquisarId(3);
    echo "<pre>";
    print_r($alunoAlt);
    echo "</pre>";

    // Pesquisa aproximada.
    $alunoNome = $alunoDao->pesquisarNome("la");
    echo "<pre>";
    print_r($alunoNome);
    echo "</pre>";
?>