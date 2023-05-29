<?php 

class GeneroView {
    public function showListGeneros($generos) {
        echo '<h1>GENERO</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th colspan=2>ACTION</th>
                </tr>';
        for($i = 0; $i<count($generos);$i++){
            echo "<tr>";
            echo "<td>".$generos[$i]['id']."</td>";
            echo "<td>".$generos[$i]['nome_genero']."</td>";
            echo "<td><a class=btnEdit href='index.php?route=genero&&id=".$generos[$i]['id']."&&action=edit'>EDIT</a></td>";
            echo "<td><a class=btnRemove href='index.php?route=genero&&id=".$generos[$i]['id']."&&action=delete'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='index.php?route=genero&&action=insert'>NEW</a>";
    }

    public function showInsertForm() {
        echo "<h1>ADICIONAR GENERO</h1>";
        echo "<form method='POST' action='index.php?route=genero&&action=insert'>
            <label for='nome'>Nome</label>
            <input type='text' name='nome' required><br>
            <input type='submit' value='insert'>
            <a class='btnBack'  href='index.php?route=genero&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($genero) {
        echo "<h1>ATUALIZAR GENERO</h1>";
        echo "<form action='index.php?route=genero&&action=update' method='POST'>
                <input type=hidden name='id' value='".$genero['id']."'>
                <label for='nome'>Nome</label>
                <input type=text name='nome' value='".$genero['nome_genero']."'>
                <input type='submit' value='update'>
                <a class='btnBack'  href='index.php?route=genero&&action=list'>BACK</a>
              </form>";
    }
}

?>