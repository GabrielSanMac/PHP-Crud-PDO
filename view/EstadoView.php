<?php 

class EstadoView {
    public function showListEstado($estado) {
        echo '<h1>ESTADO</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>ESTADO</th>
                    <th>PAIS</th>
                    <th colspan=2>ACTION</th>
                </tr>';
        for($i = 0; $i<count($estado);$i++){
            echo "<tr>";
            echo "<td>".$estado[$i]['id']."</td>";
            echo "<td>".$estado[$i]['estado_nome']."</td>";
            echo "<td>".$estado[$i]['pais_id']."</td>";
            echo "<td><a class=btnEdit href='index.php?route=estado&&id=".$estado[$i]['id']."&&action=edit'>EDIT</a></td>";
            echo "<td><a class=btnRemove href='index.php?route=estado&&id=".$estado[$i]['id']."&&action=delete'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='index.php?route=estado&&action=insert'>NEW</a>";
    }

    public function showInsertForm() {
        echo "<h1>INSERT ESTADO</h1>";
        echo "<form method='POST' action='index.php?route=estado&&action=insert'>
            NEW ESTADO <input type='text' name='estado_id' required><br>
            NEW PAIS <input type='text' name='pais_id' required><br>
            <input type='submit' value='insert'>
            <a href='index.php?route=estado&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($estado) {
        echo "<h1>EDIT ESTADO</h1>";
        echo "<form action='index.php?route=estado&&action=update' method='POST'>
                <input type=hidden name='id' value='".$estado['id']."'>
                <input type=text name='estado_nome' value='".$estado['estado_nome']."'>
                <input type=text name='pais_id' value='".$estado['pais_id']."'>
                <input type='submit' value='update'>
              </form>";
    }
}

?>