<?php
    include_once 'templates/header.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['filtro']) && isset($_GET['valor'])) {
        $filtro = $_GET['filtro'];
        $valor = $_GET['valor'];
        // Validação básica para evitar SQL Injection
        $allowed_filters = ['genero', 'autor', 'status', 'nome'];
        if (in_array($filtro, $allowed_filters)) {
            $sql = "SELECT * FROM livros WHERE $filtro LIKE ?";
            $stmt = $conn->prepare($sql);
            $like_valor = "%" . $valor . "%";
            $stmt->bind_param("s", $like_valor);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            echo "<h3>Filtro inválido!</h3>";
        }
    }
?>

    <h1> Filtrar Livros</h1>
    <button><a href="ver_livros.php">Ver Todos os Livros</a></button>
    <button><a href="index.php">Página Inicial</a></button>
    <form method="GET" action="">
            <h4>Filtrar por...</h4>
            <select name="filtro" id="filtro">
                <option value="genero">Gênero</option>
                <option value="autor">Autor</option>
                <option value="status">Status</option>
                <option value="nome">Nome do Livro</option>
            </select>
        <input type="text" id="valor" name="valor" placeholder="Digite o valor">
        <button type="submit">Filtrar</button>
    </form>
<?php if (!empty($result)) { ?>
    <h1> Livros Filtrados</h1>
        <ul>
            <?php while ($tarefa = $result->fetch_assoc()) { ?>
                <li>
                    <strong class="nome">Título:</strong> <?php echo "<p class='see_books_area'>" . $tarefa['nome'] . "</p>"; ?> <br>
                    <strong class="descricao">Descrição:</strong> <?php echo "<p class='see_books_area'>" . $tarefa['descricao'] . "</p>"; ?> <br>
                    <strong class="status">Status:</strong> <?php echo "<p class='see_books_area'>" . $tarefa['status'] . "</p>"; ?> <br>
                    <strong class="autor">Autor:</strong> <?php echo "<p class='see_books_area'>" . $tarefa['autor'] . "</p>"; ?> <br>
                    <strong class="genero">Gênero:</strong> <?php echo "<p class='see_books_area'>" . $tarefa['genero'] . "</p>"; ?> <br>
                    <strong class="data">Adicionado em:</strong> <?php echo "<p class='see_books_area'>" . $tarefa['data'] . "</p>"; ?> <br>
                    <strong class="id">ID:</strong> <?php echo "<p class='see_books_area'>" . $tarefa['id'] . "</p>"; ?> <br>
                    <hr>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
<?php include_once 'templates/animation.html'; ?>

</body>
</html>
