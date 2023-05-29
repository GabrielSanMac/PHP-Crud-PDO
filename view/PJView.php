<?php

class PJView {
    public function showPJs($PJs,$cliente){
        echo '<h1>PESSOA JURIDICA</h1><br>';
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
            echo "<td>".$cliente->getClienteById($PJs[$i]['cliente_id'])['nome']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='http://localhost/mvc/index.php?route=pj&&action=insert'>NEW</a>";
    }

    public function showPJproInsertForm($endereco){
        echo "<h1>INSERT PJ</h1>";
        echo "<form action='http://localhost/mvc/index.php?route=pj&&action=insert' method='POST'>
                NAME: <input type=text name='nome'><br>
                <select name='endereco_id'>
                ";?><?php 
                $allEndereco = $endereco->getAllEndereco();
                for($i = 0; $i < count($allEndereco);$i++){
                    echo "<option value=".$allEndereco[$i]['id'].">".$endereco->getEnderecoExtenco($allEndereco[$i]['id'])['enderecoExtenco']."</option>";
                }
                echo"
                </select>
                RAZÃO SOCIAL: <input type=text name='razao_social'><br>
                CNPJ : <input type=text name='cnpj'><br>
                <input type=submit value='INSERT'>
            </form>";
    }
}

?>