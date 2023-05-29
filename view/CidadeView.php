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
        echo "<h1>NOVA CIDADE</h1>";
        echo "<form method='POST' action='index.php?route=cidade&&action=insert'>
            <label for='cidade_nome'>Cidade</label>
            <input type='text' name='cidade_nome' required><br>
            <label for='estado_id'>Estado</label>
            <input type='text' name='estado_id' required><br>
            <input type='submit' value='insert'>
            <a href='index.php?route=cidade&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($cidade) {
        echo "<h1>ATUALIZAR CIDADE</h1>";
        echo "<form action='index.php?route=cidade&&action=update' method='POST'>
                <input type=hidden name='id' value='".$cidade['id']."'>
                <label for='cidade_nome'>Cidade</label>
                <input type=text name='nome' value='".$cidade['cidade_nome']."'>
                <label for='Estado_id'>Estado</label>
                <input type=text name='nome' value='".$cidade['estado_id']."'>
                <input type='submit' value='update'>
                <a href='index.php?route=cidade&&action=list'>BACK</a>
              </form>";
    }
}

?>