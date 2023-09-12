<?php
require_once './model/Conta.php';
$conta = new Conta();
$dadosConta = $conta->getContaByPessoa($_SESSION['id']);
?>
<nav class="col-3">
    <div class="blc_saldo">
        <p>Saldo em conta</p>
        <h2>R$ <?=number_format($dadosConta['saldo'], 2, ',', ' ')?></h2>
    </div>
    <ul>
        <li><a href="home.php">Movimentação</a></li>
        <li><a href="extrato.php">Extrato</a></li>
        <li><a href="extratoPeriodo.php">Extrato por período</a></li>
        <li><a href="logout.php">Sair</a></li>
    </ul>
</nav>