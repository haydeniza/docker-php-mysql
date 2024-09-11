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
    <title>Iza</title>
</head>

<body>
    <!-- Título da seção para cadastrar o usuário -->
    <h2>Cadastrar Usuário</h2>
    <!-- Link para a página de listagem de usuários -->
    <a href="index.php">Listar</a><br><br>

    <?php
    // Captura os dados do formulário enviados via método POST e aplica filtros padrão
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // Verifica se o botão de cadastro foi pressionado
    if (!empty($dados['CadUsuario'])) {

        try {
            // Prepara a consulta SQL para inserir os dados do usuário na tabela 'usuarios'
            $query_usuario = "INSERT INTO usuarios (nome, email, senha) 
                VALUES (:nome, :email, :senha)";

            // Prepara a consulta para execução
            $cad_usuario = $conn->prepare($query_usuario);

            // Associa os valores do formulário aos parâmetros da consulta
            $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $cad_usuario->bindParam(':email', $dados['email']);
            // Criptografa a senha e a associa ao parâmetro da consulta
            $senha_cript = password_hash($dados['senha'], PASSWORD_DEFAULT);
            $cad_usuario->bindParam(':senha', $senha_cript);

            // Executa a consulta
            $cad_usuario->execute();

            // Verifica se o usuário foi cadastrado com sucesso
            if ($cad_usuario->rowCount()) {
                // Mensagem de sucesso
                echo "<p style='color: #086;'>Usuário cadastrado com sucesso!</p>";
                // Limpa os dados do formulário
                unset($dados);
            } else {
                // Mensagem de erro caso o cadastro não tenha ocorrido
                echo "<p style='color: #f00;'>Usuário não cadastrado com sucesso!</p>";
            }
        } catch (PDOException $erro) {
            // Mensagem de erro caso ocorra uma exceção no processo de cadastro
            echo "<p style='color: #f00;'>Usuário não cadastrado com sucesso!</p>";
            // Comentário: Pode-se exibir detalhes do erro utilizando $erro->getMessage()
            // echo "Usuário não cadastrado com sucesso. Erro gerado: " . $erro->getMessage() . " <br>";
        }
    }

    ?>
    <!-- Formulário para cadastro de novo usuário -->
    <form method="POST" action="">
        <!-- Campo para o nome do usuário -->
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Nome completo" value="<?php echo $dados['nome'] ?? ''; ?>" required><br><br>

        <!-- Campo para o e-mail do usuário -->
        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Melhor e-mail do usuário" value="<?php echo $dados['email'] ?? ''; ?>" required><br><br>

        <!-- Campo para a senha do usuário -->
        <label>Senha: </label>
        <input type="password" name="senha" placeholder="Senha do usuário" value="<?php echo $dados['senha'] ?? ''; ?>" required><br><br>

        <!-- Botão para enviar o formulário e cadastrar o usuário -->
        <input type="submit" value="Cadastra" name="CadUsuario">
    </form>
</body>

</html>