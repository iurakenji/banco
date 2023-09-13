<?php
if($_POST){

    $dir = getcwd();
    require_once $dir . '\model\Conta.php';
    require_once $dir . '\model\Movimentacao.php';

    $transok=false;

    $idPessoa = $_SESSION["id"];
    $conta = new Conta();
    $dadosConta = $conta->getContaByPessoa($idPessoa);
    $valor = $_POST["valortransf"];

    //Depósito
        if ($valor <= $dadosConta['saldo']){
                $novoSaldo = $dadosConta['saldo'] + $valor;
                $acao="Saque";
                $transok=true;
                } else {
                    $novoSaldo = $dadosConta['saldo'];
                    echo "<script>alert('Saldo insuficiente para saque.');</script>";
                }
            //Transferência
            if (isset($_POST["valortransf"])){
                $valor = $_POST["valortransf"] * -1;
                $agencia = $_POST["agencia"];
                $contaDest = $_POST["conta"];

                $cDestino = new Conta();
                $dDestino = $cDestino->getContaByConta($agencia,$contaDest);
                if ($dDestino != null) {
                    
                    if (($valor * -1) <= $dadosConta['saldo']){
                        $novoSaldo = $dadosConta['saldo'] + $valor;
                        $acao="Transferência";
                        $transok=true;
                        
                        } else {
                            $novoSaldo = $dadosConta['saldo'];
                            echo "<script>alert('Saldo insuficiente para transferência.');</script>";
                        }
                } else {
                    $transok = false;
                    echo "<script>alert('Conta de destino inexistente.');</script>";
                }
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

        $mov->insert([
            "acao" => $acao,
            "valor" => $valor * -1,
            "data_movimentacao" => $data,
            "conta_id" => $dDestino["id"]
        ]);

        echo "<script>alert('Transação realizada com sucesso.');</script>"; 
    }
}