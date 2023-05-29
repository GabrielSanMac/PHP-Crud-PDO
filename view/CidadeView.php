<?php 

class CidadeView {
    public function showListCidade($cidade) {
        echo '<h1>CIDADE</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>CIDADE</th>
                    <th>ESTADO</th>
                    <th colspan=2>ACTION</th>
                </tr>';
        for($i = 0; $i<count($cidade);$i++){
            echo "<tr>";
            echo "<td>".$cidade[$i]['id']."</td>";
            echo "<td>".$cidade[$i]['cidade_nome']."</td>";
            echo "<td>".$cidade[$i]['estado_id']."</td>";
            echo "<td><a class=btnEdit href='index.php?route=cidade&&id=".$cidade[$i]['id']."&&action=edit'>EDIT</a></td>";
            echo "<td><a class=btnRemove href='index.php?route=cidade&&id=".$cidade[$i]['id']."&&action=delete'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='index.php?route=cidade&&action=insert'>NEW</a>";
    }

    public function showInsertForm() {
        echo "<h1>INSERT FORM CIDADE</h1>";
        echo "<form method='POST' action='index.php?route=cidade&&action=insert'>
            NEW CIDADE <input type='text' name='cidade_nome' required><br>
            NEW ESTADO <input type='text' name='estado_id' required><br>
            <input type='submit' value='insert'>
            <a href='index.php?route=cidade&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($cidade) {
        echo "<h1>EDIT CIDADE</h1>";
        echo "<form action='index.php?route=cidade&&action=update' method='POST'>
                <input type=text name='id' value='".$cidade['id']."'>
                <input type=text name='nome' value='".$cidade['cidade_nome']."'>
                <input type=text name='nome' value='".$cidade['estado_id']."'>
                <input type='submit' value='update'>
              </form>";
    }
}

?>