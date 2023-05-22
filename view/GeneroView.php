<?php 

class GeneroView {
    public function showListGeneros($generos) {
        echo '<h1>GENDER LIST</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>ACTION</th>
                </tr>';
        for($i = 0; $i<count($generos);$i++){
            echo "<tr>";
            echo "<td>".$generos[$i]['id']."</td>";
            echo "<td>".$generos[$i]['nome_genero']."</td>";
            echo "<td><a href='index.php?route=genero&&id=".$generos[$i]['id']."&&action=edit'>EDIT GENDER</a></td>";
            echo "<td><a href='index.php?route=genero&&id=".$generos[$i]['id']."&&action=delete'>DELETE GENDER</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a href='index.php?route=genero&&action=insert'>INSERT NEW GENDER</a>";
    }

    public function showInsertForm() {
        echo "<h1>INSERT FORM AUTHOR</h1>";
        echo "<form method='POST' action='index.php?route=genero&&action=insert'>
            NEW NAME <input type='text' name='nome' required><br>
            <input type='submit' value='insert'>
            <a href='index.php?route=genero&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($genero) {
        echo "<h1>EDIT CLIENT</h1>";
        echo "<form action='index.php?route=genero&&action=update' method='POST'>
                <input type=text name='id' value='".$genero['id']."'>
                <input type=text name='nome' value='".$genero['nome_genero']."'>
                <input type='submit' value='update'>
              </form>";
    }
}

?>