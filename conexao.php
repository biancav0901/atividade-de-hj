<?php
$host = 'localhost'; // Endereço do servidor
$usuario = 'root'; // Seu usuário do MySQL
$senha = ''; // Sua senha do MySQL
$banco = 'db_provab'; // O nome do banco de dados

// Criando a conexão
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
} else {
    // Mensagem para verificar se a conexão foi bem-sucedida
    echo "Conectado com sucesso ao banco de dados.";
}
?>

