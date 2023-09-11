<?php

if($_POST){

    require_once '../model/Pessoa.php';
    require_once '../model/Conta.php';

    $nome = isset($_POST["nome"]) ? addslashes(trim($_POST["nome"])) : FALSE;
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : FALSE;
    $cpf = isset($_POST["cpf"]) ? addslashes(trim($_POST["cpf"])) : FALSE;
    $nascimento = isset($_POST["nascimento"]) ? addslashes(trim($_POST["nascimento"])) : FALSE;
    $senha = isset($_POST["senha"]) ? sha1(addslashes(trim($_POST["senha"]))) : FALSE;

    $pessoa = new Pessoa();

    $dados = $pessoa->getPessoaByEmail($email);

    $erro = '';
    if (isset($dados[0])) {
    if ($dados[0]['email'] == $email) {
        $erro = 'O e-mail ' . $dados[0]['email'] . ' já tem uma conta associada.';
    }}

    if (!$erro == ''){
    echo '<script> alert("' . $erro . '"); </script>';
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= ../novaconta.php'>";
    } else {
        $id = $pessoa->insert([
            "nome" => $nome,
            "email" => $email,
            "cpf" => $cpf,
            "nascimento" => $nascimento,
            "senha" => $senha
        ]);
        $pessoa -> getPessoaByEmail($email);
        $conta = new Conta();
        $conta->insert([
            "agencia" => "1234",
            "contacorrente" => rand(1000,9999),
            "saldo" => 0,
            "pessoa_id" => $id
        ]);
    echo '<script> alert("Conta Criada com sucesso. Entre com os dados informados na tela de login."); </script>';
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= ../index.php'>";
    }
}