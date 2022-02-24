<?php
    session_start();
    if(isset($_POST["email"]) && isset($_POST["pswd"])){
        if($_POST["email"] == "email@com" && $_POST["pswd"]=="senha"){
            $_SESSION["email"] = $_POST["email"];
            header("Location: index.php");
            exit;
        } else {
            header("Location: login.php?error=login");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
      <title>Login de Administrador</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
    <body>
        <!--Barra de Navegação: -->
            <?php include 'cabecalho.php'; ?>
                
        <div class="container mt-3 w-50 p-3">
            <h2>Login</h2>
            <p>Autentique-se para visualizar, editar e gerenciar os relatórios:</p>
          <?php 
            if(isset($_GET["error"])) {
          ?>
          <p class="text-danger">Login ou senha inválida!</p>
          <?php 
            }
          ?>
          <form action="login.php" method="post">
            <div class="mb-3 mt-3">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Seu email" name="email">
            </div>
            <div class="mb-3">
              <label for="pwd">Senha:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Sua senha" name="pswd">
            </div>
            <div class="form-check mb-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember">Lembrar usuário
              </label>
            </div>
            <button type="submit" class="btn btn-success">Logar no sistema</button>
          </form>
        </div>
        <br><br>
        
        <!-- FOOTER DA PÁGINA -->
            <?php
                include 'rodape.html';
            ?>
    </body>
</html>