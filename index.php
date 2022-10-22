<head>
    <link rel="stylesheet" href="styles.css">
</head>

<?php
    session_start();
    //verifica se a sessao esta aberta
    if(!isset($_SESSION['login'])){
        header('location:login.php');
    }
    include 'conn.php';
    $id = $_SESSION['login'];
    $consulta_nome = $conn -> prepare('SELECT * FROM cadastro WHERE id_cad = ?');
    $consulta_nome -> bindValue(1, $id);
    $consulta_nome -> execute();
    $row = $consulta_nome->fetch();
    $nome = $_SESSION['nome'];
    echo "<h1>Bem Vindo ".$nome."</h1>";
    echo "<a href='index.php?aviso'>Logout</a>";
    if(isset($_GET['aviso'])){
        echo "<br/><br/> Deseja Realmente sair?<br/>";
        echo "<a href='index.php?logout'>Sim<a/><br/>";
        echo "<a href='index.php'>Não<a/>";
    }

    //realizar logout
    if(isset($_GET['logout'])){
        session_destroy();
        header('location:login.php');

    }

?>