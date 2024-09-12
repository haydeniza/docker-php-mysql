## Instalar WSL
Verificar a versão do WSL.
```
wsl --list --verbose
```

Pausar o WSL.
```
wsl --unregister Ubuntu
```

Instalar Ubuntu e WSL.
```
wsl.exe --install Ubuntu
```

## Instalar e executar o MySQL no Docker

Pesquisar imagem "mysql" [Docker Hub](https://hub.docker.com/)

Baixar a imagem do MySQL para o Docker.
```
docker pull mysql:8.0.39
```

Criar o container com MySQL, mapear a porta e indicar que a porta 3306 da máquina corresponde à porta 3306 do Docker, atribuir o nome do container, utilizar o usuário padrão do MySQL, definir a senha como 123456 e executar o MySQL em segundo plano, ou seja, em modo "detached" sem bloquear o terminal.
```
docker run -p 3306:3306 --name mysql_celke -e MYSQL_ROOT_PASSWORD=123456 -d mysql:8.0.39
```

Listar todos os contêineres em execução e parados.
```
docker ps -a
```

Acessar a base de dados atraves do PowerShell.
```
docker exec -it mysql_celke mysql -u root -p
```

Listar as base de dados.
```
SHOW DATABASES;
```

Criar a base de dados Celke.
```
CREATE DATABASE iza CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

ler tabelas e informações
USE iza;
´´´´

Crie a tabela 'usuarios';

CREATE TABLE iza.usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);
´´´´

Olhar as tabelas
SHOW TABLES;
´´´´

Sair do MySQL no PowerShell.
```
CTRL + d
```

baixar drive 
docker-php-ext-install pdo_mysql
´´´´

Pausar o container.
```
docker stop ID_DO_CONTAINER
```

Iniciar o container.
```
docker start ID_DO_CONTAINER/NOME_DO_CONTAINER
```

Remover o container.
```
docker container rm ID_DO_CONTAINER
```

Remover o container mesmo executando o mesmo.
```
docker container rm ID_DO_CONTAINER --force
```
 
Remover a imagem.
```
docker image rm ID_DO_CONTAINER
```