<?php

if($_POST){

    $dir = getcwd();
    require_once '..\model\Pessoa.php';

    $email = isset($_POST["email"]) ? sha1(addslashes(trim($_POST["email"]))) : FALSE;
    $cpf = isset($_POST["cpf"]) ? sha1(addslashes(trim($_POST["cpf"]))) : FALSE;
    $nascimento = isset($_POST["nascimento"]) ? sha1(addslashes(trim($_POST["nascimento"]))) : FALSE;
    
    $erro = '';

    $pessoa = new Pessoa();  
    $dados = $pessoa->getPessoaByEmail($_POST["email"]);

    if ($dados[0]["email"] == $email){
        if ($dados[0]["cpf"] == $cpf && $dados[0]["nascimento"] == $nascimento) {
            
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