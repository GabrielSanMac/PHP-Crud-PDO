<?php 

class GerenteView {
    public function showListGerentes($gerentes) {
        echo '<h1>GERENTE</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th colspan=2>ACTION</th>
                </tr>';
        for($i = 0; $i<count($gerentes);$i++){
            echo "<tr>";
            echo "<td>".$gerentes[$i]['id']."</td>";
            echo "<td>".$gerentes[$i]['gerente_nome']."</td>";
            echo "<td><a class=btnEdit href='index.php?route=gerente&&id=".$gerentes[$i]['id']."&&action=edit'>EDIT</a></td>";
            echo "<td><a class=btnRemove href='index.php?route=gerente&&id=".$gerentes[$i]['id']."&&action=delete'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='index.php?route=gerente&&action=insert'>NEW</a>";
    }

    public function showInsertForm() {
        echo "<h1>INSERT FORM AUTHOR</h1>";
        echo "<form method='POST' action='index.php?route=gerente&&action=insert'>
            NEW NAME <input type='text' name='nome' required><br>
            <input type='submit' value='insert'>
            <a href='index.php?route=gerente&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($gerente) {
        echo "<h1>EDIT CLIENT</h1>";
        echo "<form action='index.php?route=gerente&&action=update' method='POST'>
                <input type=text name='id' value='".$gerente['id']."'>
                <input type=text name='nome' value='".$gerente['gerente_nome']."'>
                <input type='submit' value='update'>
              </form>";
    }
}

?>