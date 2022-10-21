<head>
    <link rel="stylesheet" href="styles.css">
</head>
<div class="formulario">
<form action="login.php" method="post">
<input type="text" name="user" placeholder="Usuario">
<input type="password" name="senha" placeholder="Senha">
<button type="submit" name="login">Logar</button>
</form>
</div>

<?php
    include 'conn.php';
    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $senha = $_POST['senha'];
    }

?>
