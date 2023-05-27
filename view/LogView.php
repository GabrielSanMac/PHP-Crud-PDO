<?php 

class LogView {
    public function showListLog($log) {
        echo '<h1>LOG</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>TABELA</th>
                    <th>CAMPO ALTERADO</th>
                    <th>VALOR ANTERIOR</th>
                    <th>VALOR NOVO</th>
                    <th>DATA MODIFICAÇÃO</th>
                </tr>';
        for($i = 0; $i<count($log);$i++){
            echo "<tr>";
            echo "<td>".$log[$i]['id']."</td>";
            echo "<td>".$log[$i]['tabela']."</td>";
            echo "<td>".$log[$i]['campo_alterado']."</td>";
            echo "<td>".$log[$i]['valor_anterior']."</td>";
            echo "<td>".$log[$i]['valor_novo']."</td>";
            echo "<td>".$log[$i]['data_modificacao']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

?>