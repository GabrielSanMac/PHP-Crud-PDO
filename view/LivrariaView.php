<?php 

class LivrariaView {
    public function showListLivraria($livraria) {
        echo '<h1>LIVRARIA</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th colspan=2>ACTION</th>
                </tr>';
        for($i = 0; $i<count($livraria);$i++){
            echo "<tr>";
            echo "<td>".$livraria[$i]['id']."</td>";
            echo "<td>".$livraria[$i]['nome_livraria']."</td>";
            echo "<td><a class=btnEdit href='index.php?route=livraria&&id=".$livraria[$i]['id']."&&action=edit'>EDIT</a></td>";
            echo "<td><a class=btnRemove href='index.php?route=livraria&&id=".$livraria[$i]['id']."&&action=delete'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='index.php?route=livraria&&action=insert'>NEW</a>";
    }

    public function showInsertForm() {
        echo "<h1>INSERT FORM AUTHOR</h1>";
        echo "<form method='POST' action='index.php?route=livraria&&action=insert'>
            NEW NAME <input type='text' name='nome' required><br>
            <input type='submit' value='insert'>
            <a href='index.php?route=livraria&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($livraria) {
        echo "<h1>EDIT LIVRARIA</h1>";
        echo "<form action='index.php?route=livraria&&action=update' method='POST'>
                <input type=hidden name='id' value='".$livraria['id']."'>
                <input type=text name='nome value='".$livraria['nome_livraria']."'>
                <input type='submit' value='update'>
              </form>";
    }
}

?>