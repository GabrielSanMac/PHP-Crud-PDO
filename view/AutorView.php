<?php 

class AutorView {
    public function showListAutores($autores) {
        echo '<h1>AUTHOR LIST</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th colspan=2>ACTION</th>
                </tr>';
        for($i = 0; $i<count($autores);$i++){
            echo "<tr>";
            echo "<td>".$autores[$i]['id']."</td>";
            echo "<td>".$autores[$i]['nome_autor']."</td>";
            echo "<td><a class=btnEdit href='index.php?route=autor&&id=".$autores[$i]['id']."&&action=edit'>EDIT</a></td>";
            echo "<td><a class=btnRemove href='index.php?route=autor&&id=".$autores[$i]['id']."&&action=delete'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='index.php?route=autor&&action=insert'>NEW</a>";
    }

    public function showInsertForm() {
        echo "<h1>INSERT FORM AUTHOR</h1>";
        echo "<form method='POST' action='index.php?route=autor&&action=insert'>
            NEW NAME <input type='text' name='nome' required><br>
            <input type='submit' value='insert'>
            <a href='index.php?route=autor&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($autor) {
        echo "<h1>EDIT CLIENT</h1>";
        echo "<form action='index.php?route=autor&&action=update' method='POST'>
                <input type=text name='id' value='".$autor['id']."'>
                <input type=text name='nome' value='".$autor['nome_autor']."'>
                <input type='submit' value='update'>
              </form>";
    }
}

?>