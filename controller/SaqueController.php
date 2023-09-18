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
    if (isset($_POST["valorsaque"])){
            $valor = $_POST["valorsaque"] * -1;
 
            if ($valor <= $dadosConta['saldo']){
                $novoSaldo = $dadosConta['saldo'] + $valor;
                $acao=1;
                $transok=true;
                } else {
                    $novoSaldo = $dadosConta['saldo'];
                    echo "<script>alert('Saldo insuficiente para saque.');</script>";
                }
            //Transferência
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