<?php

if($_POST){

    $dir = getcwd();
    require_once '..\model\Pessoa.php';
    require_once '..\model\Conta.php';

    $email = isset($_POST["email"]) ? $_POST["email"] : FALSE;
    $cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : FALSE;
    $nascimento = isset($_POST["nascimento"]) ? $_POST["nascimento"] : FALSE;
    
    $erro = '';

    $pessoa = new Pessoa();  
    $dados = $pessoa->getPessoaByEmail($_POST["email"]);

    if ($dados[0]["email"] == $email){
        if ($dados[0]["cpf"] == $cpf && $dados[0]["nascimento"] == $nascimento) {
            session_start();
	        $_SESSION["id"] = $dados[0]["id"];
	        $_SESSION["nome"] = $dados[0]["nome"];
            $_SESSION["email"] = $dados[0]["email"];
            $_SESSION["cpf"] = $dados[0]["cpf"];
            $_SESSION["nascimento"] = $dados[0]["nascimento"];
            $_SESSION["imagem"] = $dados[0]["imagem"];
        
            $conta = new Conta();
            $dados_conta = $conta->getContaByPessoa($dados[0]["id"]);
            //print_r($dados_conta);
            $_SESSION["conta_id"] = $dados_conta["id"];
            $_SESSION["conta"] = $dados_conta["contacorrente"];
            $_SESSION["agencia"] = $dados_conta["agencia"];
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= ../usuario.php'>";
        }
    } else {
        $erro .= "E-mail inválido";
    }

    if ($dados[0]) {
        $erro = 'Verifique as senhas digitadas.';
    }



   /* if (!$erro == ''){
    echo '<script> alert("' . $erro . '"); </script>';
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= ../usuario.php'>";
    } else {
        if (isset($novasenha)){
        $id = $pessoa->update([
            "id" => $_SESSION["id"],
            "senha" => $novasenha
        ]);}

        if (isset($target_file)){
        $id = $pessoa->update([
            "id" => $_SESSION["id"],
            "imagem" => $target_file
        ]);
        $_SESSION["imagem"] = $target_file;
    }
    }*/
   // echo '<script> alert("Alteração realizada com sucesso."); </script>';
   // echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= usuario.php'>";
}

?>