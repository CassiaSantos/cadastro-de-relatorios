<!--Barra de Navegação: -->
<nav class="navbar navbar-expand-sm navbar-light bg-light py-3">
    <div class="container-fluid">
                
        <img src="imgs/Todas-as-Logos-do-Campus-Santarm-Oficial4.png" alt="Logo IFPA Campus Santarém" style="width:75px;" class="rounded"> 
        <!-- <a class="navbar-brand" href="#"></a>-->
                 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <!--<li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Link</a>
                </li> -->
                  </ul>
                  
            <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Buscar por">
                <button class="btn btn-success" type="button">Buscar</button>
            </form>
            <?php
            if(isset($_SESSION["email"])){
            ?>
                <a class="navbar-brand m-3" href="logout.php" title="Encerrar sessão">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                        <path d="M7.5 1v7h1V1h-1z"/>
                        <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                    </svg>
                </a>
            <?php } ?>
        </div>
    </div>
</nav>

