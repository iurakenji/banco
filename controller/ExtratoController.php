<?php
require_once $dir . '/model/Movimentacao.php';


        $extrato = new Mov();
        $result = ($extratoperiodo == false) ? $extrato->getMov($_SESSION["conta_id"]) : $extrato->getMovPeriodo($_SESSION["conta_id"],$inicio,$fim);
        //print_r($result);
        if (count($result) > 0) {
        echo "<table class='table' style='width: 100%; text-align: center;'>";
        echo "<tr>";
        echo "<th scope='col' style='width: 40%; text-align: center;'>Tipo de Movimentação</th>";
        echo "<th scope='col' style='width: 30%; text-align: center;'>Data</th>";
        echo "<th scope='col' style='width: 30%; text-align: center;'>Valor</th>";
        echo "</tr>";

        for ($row = 0; $row < count($result); $row++) {

                echo "<tr>";  
                echo "<th scope='row' style='width: 40%; text-align: center;'>" . $result[$row]['acao'] . "</th>"; 
                $fdata = date_create($result[$row]["data_movimentacao"]);         
                echo "<td scope='row' style='width: 30%; text-align: center;'>" . date_format($fdata,"d-m-Y H:i") . "</td>";
                if (number_format($result[$row]["valor"] > 0)) {
                    echo "<td scope='row' style='width: 30%; color: blue; text-align: center;'> R$ " . number_format($result[$row]["valor"], 2, ',', ' ') . "</td>";} else {
                    echo "<td scope='row' style='width: 30%; color: red; text-align: center;'> R$ " . number_format($result[$row]["valor"], 2, ',', ' ') . "</td>";
                }
                echo "</tr>";
          }
        echo "</table>";
    } else {
        echo "Sem movimentações no período";
    }
        ?>