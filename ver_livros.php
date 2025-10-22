<?php
    include_once 'templates/header.php';
?>

<?php
    $sqlselect = "SELECT * FROM livros ORDER BY data DESC";
    $result = $conn->query($sqlselect);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $tarefas[] = $row;
        }
    }
?>

    <h1> Lista de Livros</h1>
    <button><a href="adicionar_livro.php">Adicionar um Livro</a></button>
    <button><a href="excluir_livro.php">Excluir um Livro</a></button>
    <button><a href="index.php">Página Inicial</a></button>
    <button><a href="filtrar_livros.php">Filtrar Livros</a></button>
    <?php if (!empty($tarefas)) { ?>
        <ul>
            <?php foreach ($tarefas as $tarefa) { ?>
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
    <?php } else { ?>
        <h2>Não Há livros na Biblioteca!</h2>
    <?php } ?>
<?php include_once 'templates/animation.html'; ?>
</body>
</html>