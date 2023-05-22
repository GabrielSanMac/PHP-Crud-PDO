<?php

class PJView {
    public function showPJs($PJs){
        echo '<h1>PESSOA JURIDICA LIST</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>CNPJ</th>
                    <th>CLIENT ID</th>
                </tr>';
        for($i = 0; $i<count($PJs);$i++){
            echo "<tr>";
            echo "<td>".$PJs[$i]['id']."</td>";
            echo "<td>".$PJs[$i]['razao_social']."</td>";
            echo "<td>".$PJs[$i]['CNPJ']."</td>";
            echo "<td>".$PJs[$i]['cliente_id']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='http://localhost/mvc/index.php?route=pj&&action=insert'>NEW</a>";
    }

    public function showPJproInsertForm(){
        echo "<h1>INSERT PJ</h1>";
        echo "<form action='http://localhost/mvc/index.php?route=pj&&action=insert' method='POST'>
                NAME: <input type=text name='nome'><br>
                ENDEREÇO : <input type=text name='endereco_id'><br>
                RAZÃO SOCIAL: <input type=text name='razao_social'><br>
                CNPJ : <input type=text name='cnpj'><br>
                <input type=submit value='INSERT'>
            </form>";
    }
}

?>