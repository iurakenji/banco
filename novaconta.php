<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abertura de Conta</title>
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
                Abertura de Conta
            </div>
        </div>
    </div>
</header>
<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>
    <div class="container d-flex justify-content-center align-items-center vh100">
    <form action="./controller/NvContaController.php" method="post" accept-charset="utf-8">
                    <ul class="item-acesso">
                        <li class="text-left">
                            <label for="">Nome Completo</label>
                            <input type="text" name="nome" class="input-text" autocomplete="none" required/>
                        </li>
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
                            <input type="date" name="nascimento" class="input-text" required/>
                        </li>
                        <li class="text-left py-2">
                            <label for="">Senha</label>
                            <input type="password" name="senha" class="input-text" required/>
                        </li>
                        <li class="text-center py-2">
                            <button type="submit" class="btn">Continuar</button>
                        </li>
                        <li><a id="btn-modal" data-toggle="modal" href="#myModal">Termos de abertura de conta</a></li>
                        <li><a href="index.php" class="link-esqueceu">Voltar</a></li>
                    </ul>
</form>
    </div>
    
    <?php include "footer.php" ?>
</body>
</html>