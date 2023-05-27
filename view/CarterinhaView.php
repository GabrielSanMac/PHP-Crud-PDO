<?php 

class CarterinhaView {
    public function showListCarterinha($carterinha) {
        echo '<h1>CARTERINHA</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>DATA VALIDADE</th>
                    <th>INSTITUICAO ID</th>
                    <th>CLIENTE ID</th>
                    <th colspan=2>ACTION</th>
                </tr>';
        for($i = 0; $i<count($carterinha);$i++){
            echo "<tr>";
            echo "<td>".$carterinha[$i]['id']."</td>";
            echo "<td>".$carterinha[$i]['data_validade']."</td>";
            echo "<td>".$carterinha[$i]['instituicao_id']."</td>";
            echo "<td>".$carterinha[$i]['cliente_id']."</td>";
            echo "<td><a class=btnEdit href='index.php?route=carterinha&&id=".$carterinha[$i]['id']."&&action=edit'>EDIT</a></td>";
            echo "<td><a class=btnRemove href='index.php?route=carterinha&&id=".$carterinha[$i]['id']."&&action=delete'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='index.php?route=carterinha&&action=insert'>NEW</a>";
    }

    public function showInsertForm() {
        echo "<h1>INSERT CARTERINHA</h1>";
        echo "<form method='POST' action='index.php?route=carterinha&&action=insert'>
            NEW DATA VALIDADE <input type='date' name='data_validade' required><br>
            NEW INSTITUIÇÃO <input type='number' name='instituicao_id' required><br>
            NEW CLIENTE <input type='number' name='cliente_id' required><br>
            <input type='submit' value='insert'>
            <a href='index.php?route=carterinha&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($carterinha) {
        echo "<h1>EDIT CLIENT</h1>";
        echo "<form action='index.php?route=carterinha&&action=update' method='POST'>
                <input type=text name='id' value='".$carterinha['id']."'>
                <input type=date name='data_validade' value='".$carterinha['data_validade']."'>
                <input type=number name='instituicao_id' value='".$carterinha['instituicao_id']."'>
                <input type=number name='cliente_id' value='".$carterinha['cliente_id']."'>
                <input type='submit' value='update'>
              </form>";
    }
}

?>