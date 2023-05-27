<?php 

class EnderecoView {
    public function showListEndereco($endereco) {
        echo '<h1>ENDERECO</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>RUA</th>
                    <th>NUMERO CASA</th>
                    <th>BAIRRO</th>
                    <th>CIDADE</th>
                    <th colspan=2>ACTION</th>
                </tr>';
        for($i = 0; $i<count($endereco);$i++){
            echo "<tr>";
            echo "<td>".$endereco[$i]['id']."</td>";
            echo "<td>".$endereco[$i]['rua_nome']."</td>";
            echo "<td>".$endereco[$i]['numero_casa']."</td>";
            echo "<td>".$endereco[$i]['bairro_nome']."</td>";
            echo "<td>".$endereco[$i]['cidade_id']."</td>";
            echo "<td><a class=btnEdit href='index.php?route=endereco&&id=".$endereco[$i]['id']."&&action=edit'>EDIT</a></td>";
            echo "<td><a class=btnRemove href='index.php?route=endereco&&id=".$endereco[$i]['id']."&&action=delete'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='index.php?route=endereco&&action=insert'>NEW</a>";
    }

    public function showInsertForm() {
        echo "<h1>INSERT FORM AUTHOR</h1>";
        echo "<form method='POST' action='index.php?route=endereco&&action=insert'>
            NEW RUA <input type='text' name='rua_nome' required><br>
            NEW NAME <input type='text' name='numero_casa' required><br>
            NEW NAME <input type='text' name='bairro_nome' required><br>
            NEW NAME <input type='text' name='cidade_id' required><br>
            <input type='submit' value='insert'>
            <a href='index.php?route=endereco&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($endereco) {
        echo "<h1>EDIT CLIENT</h1>";
        echo "<form action='index.php?route=endereco&&action=update' method='POST'>
                <input type=hidden name='id' value='".$endereco['id']."'>
                <input type=text name='rua_nome' value='".$endereco['rua_nome']."'>
                <input type=text name='numero_casa' value='".$endereco['numero_casa']."'>
                <input type=text name='bairro_nome' value='".$endereco['bairro_nome']."'>
                <input type=text name='cidade_id' value='".$endereco['cidade_id']."'>
                <input type='submit' value='update'>
              </form>";
    }
}

?>