<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de Senha</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
<header>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <a href="home.php"><i class="lni lni-invest-monitor logo text-white"></i></a>
            <div class="d-flex justify-content-between align-items-center">
                Recuperação de Senha
            </div>
        </div>
    </div>
</header>
    <div class="container d-flex justify-content-center align-items-center">
       <h2 style="margin-top: 20px; margin-bottom: 20px;" > Insira os dados abaixo para confirmação de sua identidade: </h2>
    </div>
    <div class="container d-flex justify-content-center align-items-center vh70">
    <form action="./controller/RecuperaController.php" method="post" accept-charset="utf-8">
                    <ul class="item-acesso">
                        <li class="text-left py-2">
                            <label for="">E-mail</label>
                            <input type="email" name="email" class="input-text" autocomplete="none" required/>
                        </li>
                        <li class="text-left py-2">
                            <label for="">CPF</label>
                            <input type="cpf" name="cpf" class="input-text" autocomplete="none" required/>
                        </li>
                        <li class="text-left py-2">
                            <label for="">Data de Nascimento</label>
                            <input type="date" style="margin-bottom: 10px;" name="nascimento" class="input-text" required/>
                        </li>
                        <button type="submit" style="margin-bottom: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Enviar</button>
                        <li><a href="index.php" class="link-esqueceu">Voltar</a></li>
                    </ul>
</form>

<?php
    require_once "controller\RecuperaController.php";
    ?>

<div class="modal" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
 
      <div class="modal-body">
        <p>E-mail de recuperação enviado.</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

    </div>
    
    <?php
    
    include "footer.php"

    ?>
</body>

</html>