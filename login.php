<head>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
        window.onload = ()=>{
            document.getElementById('focar').focus();
        }
    </script>
</head>
<body>
<div class="formulario">
<form action="login.php" method="post">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Usuario</label>
  <input type="text" class="form-control"  id="focar" name="user">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Senha</label>
  <input type="password" class="form-control"  name="senha" >
</div>
<!--
<input type="text" name="user" placeholder="Usuario" id="focar">
<input type="password" name="senha" placeholder="Senha">
-->
<button type="submit" class="btn btn-outline-success"  name="login">Logar</button>
<!--<button type="submit" name="login">Logar</button>-->
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
        //verifica se a senha e o usuario existem no banco de dados
        if($login -> rowCount()==0){
            echo "<h2 class='titulo'>Login ou senha invalida!</h2>";
        }else{
            //inicia sessao
           session_start();
           $row=$login->fetch();
           $_SESSION['nome']= $row['nome_cad'];
           $_SESSION['login'] = $row['id_cad'];
           
           //redireciona para a tela inicial
           header('location:index.php');
        }

    }

?>
</body>
