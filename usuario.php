<?php
//error_reporting(0);
error_reporting(E_ALL ^ E_NOTICE);
$dir = getcwd();
require_once './controller/ValidAuth.php';
require_once './model/Pessoa.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <?php include "header.php" ?>
    <div class="container d-flex mvh100">
        <?php include "nav.php" ?>
        <main class="col">
            <ul class="item-acesso">
                <li>
                    <div class="d-flex align-items-center">
                        <i class="lni lni-consulting"></i>
                        <h1>Opções de Usuário</h1>
                    </div>
                </li>
            </ul>
            <ul class="item-acesso">
                <li>
                    <div class="d-flex align-items-center">
                        <h1>Alterar Senha</h1>
                    </div>
                    <form action="upload.php" method="post">
                            <div class="d-flex align-items-end gap15 mt30">
                                <span class="text-left colInput">
                                    <label for="">Nova Senha</label>
                                    <input type="password" name="novasenha" class="input-text" required/>
                                    <label for="">Confirmar Nova Senha</label>
                                    <input type="password" name="confnovasenha" class="input-text" required/>
                                </span>
                                <button type="submit" class="btn">Enviar</button>
                            </div>
                    </form>
                </li>
            </ul>
            <ul class="item-acesso">
                <li>
                    <div class="d-flex align-items-center">
                        <h1>Imagem</h1>
                    </div>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="d-flex align-items-end gap15 mt30">
                                <img class="img-thumbnail mx-auto d-block rounded-circle" src="<?=$_SESSION['imagem'];?>" alt="Foto" style="width:150px;height:150px;">
                                Selecionar imagem:
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <input type="submit" value="Carregar Imagem" name="submit">
                            </div>
                    </form>
                </li>
            </ul>
        </main>
    </div>
    <?php include "footer.php" ?>
</body>
</html>