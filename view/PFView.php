<?php 

class PFView {
    public function showPFs($PFs,$cliente){
        echo '<h1>PESSOA FISICA</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>CPF</th>
                    <th>DATA NASCIMENTO</th>
                    <th>SEXO</th>
                    <th>CLIENT ID</th>
                </tr>';
        for($i = 0; $i<count($PFs);$i++){
            echo "<tr>";
            echo "<td>".$PFs[$i]['id']."</td>";
            echo "<td>".$PFs[$i]['CPF']."</td>";
            echo "<td>".$PFs[$i]['data_nacimento']."</td>";
            echo "<td>".$PFs[$i]['sexo']."</td>";
            echo "<td>".$cliente->getClienteById($PFs[$i]['cliente_id'])['nome']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='http://localhost/mvc/index.php?route=pf&&action=insert'>NEW</a>";
    }

    public function showPFInsertForm($endereco) {
        echo '<h1>INSERT PESSOA FISICA</h1>';
        echo "<form action='http://localhost/mvc/index.php?route=pf&&action=insert' method='POST'>
                NAME: <input type=text name='nome'><br>
                <select name='endereco_id'>
                ";?><?php 
                $allEndereco = $endereco->getAllEndereco();
                for($i = 0; $i < count($allEndereco);$i++){
                    echo "<option value=".$allEndereco[$i]['id'].">".$endereco->getEnderecoExtenco($allEndereco[$i]['id'])['enderecoExtenco']."</option>";
                }
                echo"
                </select>
                CPF: <input type=text name='cpf'><br>
                DATA NASCIMENTO : <input type=date name='data_nascimento'><br>
                SEXO : <input type=text name='sexo'><br>
                <input type=submit value='INSERT'>
            </form>";
    }
}


?>