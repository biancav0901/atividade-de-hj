<?php
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbltarefas WHERE id = $id";
    $result = $conn->query($sql);
    $tarefa = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Tarefa</title>
</head>
<body>
    <h2>Alterar Tarefa</h2>
    <form action="alterar_tarefa.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">

        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" value="<?php echo $tarefa['titulo']; ?>" required><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" required><?php echo $tarefa['descricao']; ?></textarea><br><br>

        <label for="status">Status:</label><br>
        <select id="status" name="status" required>
            <option value="pendente" <?php echo $tarefa['status'] == 'pendente' ? 'selected' : ''; ?>>Pendente</option>
            <option value="em andamento" <?php echo $tarefa['status'] == 'em andamento' ? 'selected' : ''; ?>>Em andamento</option>
            <option value="concluída" <?php echo $tarefa['status'] == 'concluída' ? 'selected' : ''; ?>>Concluída</option>
        </select><br><br>

        <input type="submit" value="Alterar">
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];

    $sql = "UPDATE tbltarefas SET titulo='$titulo', descricao='$descricao', status='$status' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Tarefa alterada com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>
