<?php

    $host = 'localhost';
    $usuario = 'root';
    $senha = 'sua_senha';
    $banco = 'leituras';
    $conn = new mysqli($host, 
                        $usuario, 
                        $senha, 
                        $banco);


    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Pessoal</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Averia+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
