<?php
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];
    $id_usuario = $_POST['id_usuario'];

    $sql = "INSERT INTO tbltarefas (titulo, descricao, status, id_usuario) VALUES ('$titulo', '$descricao', '$status', '$id_usuario')";
    if ($conn->query($sql) === TRUE) {
        echo "Tarefa cadastrada com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>
