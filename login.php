<head>
    <link rel="stylesheet" href="styles.css">
    <script>
        window.onload = ()=>{
            document.getElementById('focar').focus();
        }
    </script>
</head>
<div class="formulario">
<form action="login.php" method="post">
<input type="text" name="user" placeholder="Usuario" id="focar">
<input type="password" name="senha" placeholder="Senha">
<button type="submit" name="login">Logar</button>
</form>
</div>

<?php
    include 'conn.php';
    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $senha = $_POST['senha'];
        $login = $conn -> prepare('SELECT * FROM `cadastro` WHERE `user_cad` = ? AND `senha_cad` = md5(?);');
        $login -> bindParam(1, $user);
        $login -> bindParam(2, $senha);
        $login -> execute();
        if($login -> rowCount()==0){
            echo "<h2 class='titulo'>Login ou senha invalida!</h2>";
        }else{
            echo "<h2 class='titulo'>Deu certo</h2>";
        }

    }

?>

