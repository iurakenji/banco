<?php
//error_reporting(0);
error_reporting(E_ALL ^ E_NOTICE);
require_once './controller/ValidAuth.php';

$dir = getcwd();
if($_POST){
    $inicio = $_POST["inicio"];
    $fim = $_POST["fim"];
} else {
    $inicio = '1990-01-01';
    $fim = date("Y-m-d");
}
$extratoperiodo = true;
        

 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extrato Por Período</title>
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
                        <h1>Extrato por Período</h1>
                    </div>
                    <form action="" method="post">
                        <div class="d-flex align-items-end gap15 mt30">
                            <span class="text-left colInput">
                                <label for="">Data Inicial</label>
                                <input type="date" name="inicio" value=<?php echo $inicio; ?> class="input-text" required/>
                                <label for="">Data Final</label>
                                <input type="date" name="fim" value="<?php echo $fim; ?>" class="input-text" required/>
                            </span>
                            <button type="submit" class="btn">Filtrar</button>
                        </div>
                    </form>
                </li>
            </ul>
            <?php
            require "./controller/ExtratoController.php"; ?>
        </main>
    </div>
    <?php
    include "footer.php" ?>
</body>
</html>