<?php 

class PaisView {
    public function showListPais($pais) {
        echo '<h1>PAIS</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>PAIS</th>
                    <th colspan=2>ACTION</th>
                </tr>';
        for($i = 0; $i<count($pais);$i++){
            echo "<tr>";
            echo "<td>".$pais[$i]['id']."</td>";
            echo "<td>".$pais[$i]['pais_nome']."</td>";
            echo "<td><a class=btnEdit href='index.php?route=pais&&id=".$pais[$i]['id']."&&action=edit'>EDIT</a></td>";
            echo "<td><a class=btnRemove href='index.php?route=pais&&id=".$pais[$i]['id']."&&action=delete'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='index.php?route=pais&&action=insert'>NEW</a>";
    }

    public function showInsertForm() {
        echo "<h1>INSERT PAIS</h1>";
        echo "<form method='POST' action='index.php?route=pais&&action=insert'>
            NEW PAIS <input type='text' name='pais_nome' required><br>
            <input type='submit' value='insert'>
            <a href='index.php?route=pais&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($pais) {
        echo "<h1>EDIT PAIS</h1>";
        echo "<form action='index.php?route=pais&&action=update' method='POST'>
                <input type=hidden name='id' value='".$pais['id']."'>
                <input type=text name='pais_nome' value='".$pais['pais_nome']."'>
                <input type='submit' value='update'>
              </form>";
    }
}

?>