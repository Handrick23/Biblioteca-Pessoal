<?php
    include_once 'templates/header.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $status = $_POST['status'];
        $autor = $_POST['autor'];
        $genero = $_POST['genero'];
        $sqlinsert = "INSERT INTO livros (nome, descricao, status, autor, genero, data) 
                      VALUES (?, ?, ?, ?, ?, NOW())";

        $stmt = $conn->prepare($sqlinsert);

        if ($stmt === FALSE) {
            die("Erro na preparação da consulta: " . $conn->error);
        }

        $stmt->bind_param("sssss", $nome, $descricao, $status, $autor, $genero);

        if ($stmt->execute()) {
            echo "<h3>Livro adicionado com sucesso!</h3>";
        } else {
            echo "<h3>Erro ao adicionar livro: " . $stmt->error . "</h3>";
        }

        $stmt->close();
    }
?>
<h2>Adicionar Livro</h2>
<form action="adicionar_livro.php" method="POST">
    <label for="nome" class="label">Título:</label><br>
    <input type="text" id="nome" name="nome" class="input" required><br><br>

    <label for="descricao" class="label">Descrição:</label><br>
    <textarea id="descricao" name="descricao" class="input" required></textarea><br><br>

    <label for="status" class="label">Status:</label><br>
    <select id="status" name="status" class="input" required>
        <option class="lido" value="Lido">Lido</option>
        <option class="lendo" value="Lendo">Lendo</option>
        <option class="nao-lido" value="Não Lido">Não Lido</option>
    </select><br><br>

    <label for="autor" class="label">Autor:</label><br>
    <input type="text" id="autor" name="autor" class="input" required><br><br>

    <label for="genero" class="label">Gênero:</label><br>
    <input type="text" id="genero" name="genero" class="input" required><br><br>

    <label for="ano_publicacao" class="label">Ano de Publicação:</label><br>
    <input type="number" id="ano_publicacao" name="ano_publicacao" class="input" required><br><br>

    <button type="submit" class="button">Adicionar Livro</button><br><br>
</form>

    <button><a href="ver_livros.php" class="button">Ver Livros</a></button>
<?php include_once 'templates/animation.html'; ?>
</body>
</html>