<?php 

class EditoraView {
    public function showListEditora($editora) {
        echo '<h1>EDITORA</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>EDITORA</th>
                    <th>TELEFONE</th>
                    <th>ENDEREÇO</th>
                    <th>GERENTE</th>
                    <th colspan=2>ACTION</th>
                </tr>';
        for($i = 0; $i<count($editora);$i++){
            echo "<tr>";
            echo "<td>".$editora[$i]['id']."</td>";
            echo "<td>".$editora[$i]['editora_nome']."</td>";
            echo "<td>".$editora[$i]['telefone_id']."</td>";
            echo "<td>".$editora[$i]['endereco_id']."</td>";
            echo "<td>".$editora[$i]['gerente_id']."</td>";
            echo "<td><a class=btnEdit href='index.php?route=editora&&id=".$editora[$i]['id']."&&action=edit'>EDIT</a></td>";
            echo "<td><a class=btnRemove href='index.php?route=editora&&id=".$editora[$i]['id']."&&action=delete'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='index.php?route=editora&&action=insert'>NEW</a>";
    }

    public function showInsertForm() {
        echo "<h1>INSERT EDITORA</h1>";
        echo "<form method='POST' action='index.php?route=editora&&action=insert'>
            NEW EDITORA <input type='text' name='editora_nome' required><br>
            NEW TELEFONE <input type='text' name='telefone_id' required><br>
            NEW ENDEREÇO <input type='text' name='endereco_id' required><br>
            NEW GERENTE <input type='text' name='gerente_id' required><br>
            <input type='submit' value='insert'>
            <a href='index.php?route=editora&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($editora) {
        echo "<h1>EDIT EDITORA</h1>";
        echo "<form action='index.php?route=editora&&action=update' method='POST'>
                <input type=hidden name='id' value='".$editora['id']."'>
                <input type=text name='editora_nome' value='".$editora['editora_nome']."'>
                <input type=text name='telefone_id' value='".$editora['telefone_id']."'>
                <input type=text name='endereco_id' value='".$editora['endereco_id']."'>
                <input type=text name='gerente_id' value='".$editora['gerente_id']."'>
                <input type='submit' value='update'>
              </form>";
    }
}

?>