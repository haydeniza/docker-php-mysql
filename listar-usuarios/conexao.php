<?php

    // Início da conexão com o banco de dados utilizando PDO

    // Define o host do banco de dados (geralmente 'localhost' para ambientes locais)
    $host = "teste_mysql";

    // Define o nome de usuário para a conexão com o banco de dados (neste caso, 'root')
    $user = "root";

    // Define a senha para a conexão com o banco de dados (neste caso, a senha está vazia)
    $pass = "123456";

    // Define o nome do banco de dados que será utilizado
    $dbname = "teste_bd";

    // Define a porta para a conexão com o banco de dados (3306 é a porta padrão para MySQL)
    $port = 3306;

    try {
        // Conexão com a porta especificada
        // $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

        // Conexão sem especificar a porta (usando a porta padrão)
        $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

        // Comentado: Mensagem de sucesso para depuração (pode ser descomentada para verificar a conexão)
        // echo "Conexão com banco de dados realizada com sucesso.";
    } catch (PDOException $err) {
        // Captura e exibe a mensagem de erro caso a conexão com o banco de dados falhe
        echo "Erro: Conexão com banco de dados não realizada com sucesso. Erro gerado: " . $err->getMessage();
    }

    // Fim da conexão com o banco de dados utilizando PDO