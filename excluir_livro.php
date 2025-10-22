<?php
    include_once 'templates/header.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $sqldelete = "DELETE FROM livros WHERE id = '$id'";

        if ($conn->query($sqldelete) === TRUE) {
            if ($conn->affected_rows > 0) {
                echo "<h3>Livro excluído com sucesso!</h3>";
            } else {
                echo "<h3>Nenhum livro encontrado com esse título!</h3>";
            }
        } else {
            echo "<h3>Erro ao excluir livro: " . $conn->error . "</h3>";
        }
    }
?>

<h2>Excluir Livro</h2>
<p> Digite o ID do Livro a ser Excluído:</p>
<form action="excluir_livro.php" method="POST">
    <label class="label" for="id">ID do Livro:</label><br>
    <input type="text" id="id" name="id" class="input" required><br><br>
    <button type="submit" class="button">Excluir Livro</button><br><br>
</form>
<button><a href="ver_livros.php" class="button">Ver Livros</a></button>
<button><a href="adicionar_livro.php" class="button">Adicionar um Livro</a></button>
<?php include_once 'templates/animation.html'; ?>
</body>
</html>