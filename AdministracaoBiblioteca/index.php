<?php
#Proteger a página de login:
    #Inicia a sessão:
    session_start();
    
    #se o admin não estiver logado, vai ser redirecionado para a página de login, assim, só será possível acessar o conteúdo após a autenticação:
    if(!isset($_SESSION["email"])){
       header("Location: login.php");
       exit;
    }
    
    #Conexão do sistma web com o banco de dados SQL:
    $con = mysqli_connect("localhost","cassia","cassia", "cassia");
    if(!$con){
        die("Sistema fora do ar!");
    }
    
    $sql = "SELECT * FROM `relatorios`";
    $query = mysqli_query($con, $sql);
    
    //Cabeçalho da página:
    include 'cabecalho.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Relatórios de Estágio IFPA Campus Santarém</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
    <body>
        <div class="container mt-3">
          <h2>Relatórios Cadastrados</h2>
          <p>Visualize, edite e gerencie os relatórios:</p>
          <button type="button" class="btn btn-success">
            <a href="formularioRelatorio.php" class="btn-success"><strong>Cadastrar Relatório</strong></a>
          </button><br>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Opções</th>
              </tr>
            </thead>
            <tbody>
            
                <!--Preenchimento dos nomes de relatórios na tabela:-->
                <?php
                    while ($row = mysqli_fetch_assoc($query)){
                ?>
                <tr>
                    <td><?=$row["idRelatorio"]?></td>
                    <td><?=$row["tituloRelatorio"]?></td>
                    
                    <!--Opções de operações para cada relatório cadastrado-->
                    <td>
                        <button type="button" class="btn btn-warning">
                            <a href="formularioRelatorio.php?op=editar&id=<?=$row["idRelatorio"]?>" class="btn-warning text-white" style="text-decoration: none;">editar</a>
                        </button>
                        <button type="button" class="btn btn-danger">
                          <a href="formularioRelatorio.php?op=apagar&id=<?=$row["idRelatorio"]?>" class="btn-danger">apagar</a>
                        </button>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
          </table>
        </div><br><br><br>
        <!--Footer da página-->
        <?php
            include 'rodape.html';
        ?>
    </body>
</html>