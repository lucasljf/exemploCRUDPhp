# Exemplo: CRUD com PHP

Exemplo simples da implementação de um CRUD (ainda incompleto) utilizando a linguagem PHP.

## Problemas

O projeto/exemplo apresenta diversos pontos que podem ser melhorados.

- É realmente necessário instanciar um objeto da classe `Conexao` antes de criar um `Dao`? O que pode ser feito para evitar a repetição desse "trabalho"?

- Quando alteramos um aluno, pesquisamos (no BD) para preencher o formulário e, em seguida, pesquisamos novamente para executarmos o método `alterar()`. Como evitar a repetição dessa consulta?