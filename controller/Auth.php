<?php

require_once '../model/Pessoa.php';
require_once '../model/Conta.php';

$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : FALSE;
$senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : FALSE;

if (!$email || !$senha) {
    echo "<script>alert('Você deve digitar seu E-mail e Senha para acessar o sistema.');</script>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= ../index.php'>";
    exit;
}


$pessoa = new Pessoa();
$dados = $pessoa->getPessoaByEmail($email);

//echo "<pre>";
//print_r($dados);
//exit;


if (($dados[0]['email'] === $email) && ($dados[0]['senha'] == sha1($senha))) {
	
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

    header("Location: ../home.php");
    exit;
} elseif (($dados[0]['email'] == $email) && ($dados[0]['senha'] != $senha)) {
    echo "<script>alert('Senha incorreta.');</script>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= ../index.php'>";
    exit();
} else {
    echo "<script>alert('Verifique o e-mail e senha.');</script>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= ../index.php'>";
    exit();
}
?>