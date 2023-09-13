<?php
if($_POST){

    $dir = getcwd();
    require_once $dir . '\model\Conta.php';
    require_once $dir . '\model\Movimentacao.php';

    $transok=false;

    $idPessoa = $_SESSION["id"];
    $conta = new Conta();
    $dadosConta = $conta->getContaByPessoa($idPessoa);

    //Depósito
    if (isset($_POST["valordeposito"])){
    $acao="Depósito";
    $transok=true;
    $valor = $_POST["valordeposito"];
    $novoSaldo = $dadosConta['saldo'] + $valor;
        //Saque          
        }

    if ($transok==true){
        $mov = new Mov();

        $data = date("Y-m-d H:i:s");
        $conta->update([
            "saldo" => $novoSaldo, 
            "id" => $dadosConta['id']
        ]);

        $mov->insert([
            "acao" => $acao,
            "valor" => $valor,
            "data_movimentacao" => $data,
            "conta_id" => $dadosConta['id']

    ]);
        echo "<script>alert('Transação realizada com sucesso.');</script>"; 
    }
}