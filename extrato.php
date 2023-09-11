<?php
//error_reporting(0);
error_reporting(E_ALL ^ E_NOTICE);
require_once './controller/ValidAuth.php';
?>
<?php 
$dir = getcwd();
$extratoperiodo = false;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extrato</title>
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
                        <i class="lni lni-agenda"></i>
                        <h1>Extrato</h1>
                    </div>
                </li>
            </ul>
        <?php
        require "./controller/ExtratoController.php";
        ?>
        </main>
    </div>
    <?php include "footer.php" ?>
</body>
</html>