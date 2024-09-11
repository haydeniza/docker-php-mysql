<?php
// Inclui o arquivo de conexão com o banco de dados
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Define o conjunto de caracteres como UTF-8 -->
    <meta charset="UTF-8" />
    <!-- Define o título da página -->
    <title>Teste docker</title>
    <!-- Inclui o ícone da página -->
    <link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>
    <!-- Título da seção para listar os usuários -->
    <h2>Listar usuários</h2>
    <!-- Link para a página de cadastro de novos usuários -->
    <a href="cadastrar.php">Cadastrar</a><br><br>

    <?php
    // Consulta SQL para selecionar os campos id, nome e email da tabela 'usuarios'
    // Os resultados serão ordenados pelo campo 'id' em ordem decrescente
    $query_usuarios = "SELECT id, nome, email 
                        FROM usuarios
                        ORDER BY id DESC";

    // Prepara a consulta SQL para execução
    $result_usuarios = $conn->prepare($query_usuarios);

    // Executa a consulta preparada
    $result_usuarios->execute();

    // Itera sobre os resultados da consulta, retornando cada linha como um array associativo
    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {

        // Extrai as variáveis do array associativo para facilitar o acesso aos dados
        extract($row_usuario);

        // Exibe o ID do usuário
        echo "ID: $id <br>";
        // Exibe o nome do usuário
        echo "Nome: $nome <br>";
        // Exibe o e-mail do usuário
        echo "E-mail: $email <br>";
        // Exibe uma linha horizontal para separar os registros
        echo "<hr>";
    }

    ?>
</body>

</html>