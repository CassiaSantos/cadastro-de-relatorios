<?php
    session_start();
    if(!isset($_SESSION["email"])){
       header("Location: login.php");
       exit;
    }
    
    if(isset($_GET["op"]) && isset($_GET["id"])){
        //Conexão na banco de dados:
        $con = mysqli_connect("localhost","cassia","cassia", "cassia");
        if($con){
            //Operações de Edição e Exclusão:
            if(isset($_POST["titulo"])){
                //Edição:
                if ($_GET["op"] == "editar"){
                    $sql = "UPDATE `relatorios` SET `tituloRelatorio`='".$_POST["titulo"]."' WHERE `idRelatorio` = ".$_GET["id"].";";
                //Exclusão:
                } else {
                    $sql = "DELETE FROM `relatorios` WHERE `idRelatorio` = ".$_GET["id"].";";
                }
                if(mysqli_query($con,$sql)){
                   header("Location: index.php");
                    mysqli_close();
                    exit;
                } else {
                    header("Location: index.php?error=bd_");
                    mysqli_close();
                    exit;
                }
            } else {
                // visualização dos dados do banco...
                $sql = "SELECT * FROM `relatorios` WHERE `idRelatorio` = ".$_GET["id"].";";
                $query = mysqli_query($con, $sql);
                if (mysqli_num_rows($query) == 1) {
                    $row = mysqli_fetch_assoc($query);
                } else {
                    header("Location: index.php?error=RegistroNaoEncontrado");
                    mysqli_close();
                    exit;
                }
                if ($_GET["op"] == "editar"){
                    $btn = "Editar";
                    $btn_cor = "btn-warning text-white";
                } else {
                    $btn = "Apagar";
                    $btn_cor = "btn-danger";
                }
            }
        } else {
            header("Location: formularioRelatorio.php?error=bd_conect");
            exit;
        }
        $url = "?op=". $_GET["op"] . "&id=" . $_GET["id"];
    } else{
        //Cadastrando de novo relatório:
        if(isset($_POST["titulo"])){
        $con = mysqli_connect("localhost","cassia","cassia", "cassia");
        if($con){
            $sql = "INSERT INTO `relatorios` (`idRelatorio`, `tituloRelatorio`) VALUES (NULL, '".$_POST["titulo"]."');";
            if(mysqli_query($con,$sql)){
                header("Location: index.php?info=rel_inserted");
                mysqli_close();
                exit;
            } else {
                header("Location: formularioRelatorio.php?error=bd_insert");
                mysqli_close();
                exit;
            }
        } else {
            header("Location: formularioRelatorio.php?error=bd_conect");
            exit;
        }
    }
        $url = "";
        $row["tituloRelatorio"] = "";
        $btn = "Adicionar";
        $btn_cor = "btn-success";
    }        
?>

<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <title>Cadastro de Relatórios de Estágio Supervisionado - IFPA Campus Santarém</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        
        <body>
            <!--Barra de Navegação: -->
            <?php include 'cabecalho.php'; ?>
        
            <div class="container mt-3">
                <h2>Cadastrar Relatório:</h2>
                
                <?php
                    if(isset($_GET["error"])){
                ?>
                <p class="text-danger">Pane nos sistema! Alguém me desconectou!</p>
                <?php } ?>
                
                <!--Cadastro do Título-->
                <form action="formularioRelatorio.php<?=$url?>" method="post">
                    <div class="mb-3 mt-3">
                        <label for="tituloRelatorio"><h5>Título:</h5></label>
                        <textarea class="form-control" rows="6" id="tituloRelatorio" name="titulo"><?=$row["tituloRelatorio"]?></textarea>
                    </div>
                    <!--class="btn btn-success">Cadastrar-->
                    <button type="submit" class="btn <?=$btn_cor?>"><?=$btn?></button>
                </form>
            </div><br><br><br>
            
            <!-- FOOTER DA PÁGINA -->
            <?php
                include 'rodape.html';
            ?>
        </body>
</html>
