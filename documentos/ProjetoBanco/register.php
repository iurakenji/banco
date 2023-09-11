<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body class="page_register">
    <div class="container d-flex">
        <main class="col d-flex justify-content-center align-items-center vh100">
            <div class="blc_login">
                <h1>Sou um novo cliente</h1>
                <form action="">
                    <ul>
                        <li>
                            <label for="">Email*</label>
                            <input type="email" name="email" class="input-text" />
                        </li>
                        <li>
                            <label for="">Nome*</label>
                            <input type="text" name="nome" class="input-text" />
                        </li>
                        <li>
                            <label for="">CPF*</label>
                            <input type="text" name="cpf" class="input-text" />
                        </li>
                        <li>
                            <label for="">Senha*</label>
                            <input type="password" name="senha" class="input-text" />
                        </li>
                        <li class="d-flex gap15">
                            <a href="" class="btn btn-hover">Retornar</a>
                            <button type="submit" class="btn">Salvar</button>
                        </li>
                    </ul>
                </form>
            </div>
        </main>
    </div>
</body>
</html>