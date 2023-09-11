<?php

if($_POST){

    $dir = getcwd();
    require_once $dir . '\model\Pessoa.php';

    $novasenha = isset($_POST["novasenha"]) ? sha1(addslashes(trim($_POST["novasenha"]))) : FALSE;
    $confnovasenha = isset($_POST["confnovasenha"]) ? sha1(addslashes(trim($_POST["confnovasenha"]))) : FALSE;
    $erro = '';

    if ($novasenha != $confnovasenha) {
        $erro = 'Verifique as senhas digitadas.';
    }

    $pessoa = new Pessoa();  
    $dados = $pessoa->getPessoa($_SESSION["id"]);

    if (!$erro == ''){
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
    }
    echo '<script> alert("Alteração realizada com sucesso."); </script>';
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= usuario.php'>";

}