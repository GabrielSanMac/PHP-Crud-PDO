<?php 

class InstituicaoView {
    public function showListInstituicao($instituicao) {
        echo '<h1>INSTITUIÇÃO</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th colspan=2>ACTION</th>
                </tr>';
        for($i = 0; $i<count($instituicao);$i++){
            echo "<tr>";
            echo "<td>".$instituicao[$i]['id']."</td>";
            echo "<td>".$instituicao[$i]['nome_instituicao']."</td>";
            echo "<td><a class=btnEdit href='index.php?route=instituicao&&id=".$instituicao[$i]['id']."&&action=edit'>EDIT</a></td>";
            echo "<td><a class=btnRemove href='index.php?route=instituicao&&id=".$instituicao[$i]['id']."&&action=delete'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='index.php?route=instituicao&&action=insert'>NEW</a>";
    }

    public function showInsertForm() {
        echo "<h1>INSERT FORM AUTHOR</h1>";
        echo "<form method='POST' action='index.php?route=instituicao&&action=insert'>
            NEW NAME <input type='text' name='nome' required><br>
            <input type='submit' value='insert'>
            <a href='index.php?route=instituicaos&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($instituicao) {
        echo "<h1>EDIT CLIENT</h1>";
        echo "<form action='index.php?route=instituicao&&action=update' method='POST'>
                <input type=text name='id' value='".$instituicao['id']."'>
                <input type=text name='nome' value='".$instituicao['nome_instituicao']."'>
                <input type='submit' value='update'>
              </form>";
    }
}

?>