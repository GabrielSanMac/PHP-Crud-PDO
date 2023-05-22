<?php 

class ClientView {
    public function showClients($clients){
        echo '<h1>CLIENT LIST</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>ID ADDRESS</th>
                    <th colspan=2>ACTION</th>
                </tr>';
        for($i = 0; $i<count($clients);$i++){
            echo "<tr>";
            echo "<td>".$clients[$i]['id']."</td>";
            echo "<td>".$clients[$i]['nome']."</td>";
            echo "<td>".$clients[$i]['endereco_id']."</td>";
            echo "<td><a class=btnEdit href='http://localhost/mvc/index.php?route=client&&id=".$clients[$i]['id']."&&action=edit'>EDIT</a></td>";
            echo "<td><a class=btnRemove href='http://localhost/mvc/index.php?route=client&&id=".$clients[$i]['id']."&&action=delete'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='http://localhost/mvc/index.php?route=client&&action=insert'>NEW</a>";

    }

    public function showInsertForm(){
        echo "<h1>INSERT FORM CLIENT</h1>";
        echo "<form method='POST' action='index.php?route=client&&action=insert'>
            NOME : <input type='text' name='name' required><br>
            ENDERECO (ID) <input type='text' name='addressId' required><br>
            <input type='submit' value='insert'>
            <a href='http://localhost/mvc/index.php?route=client&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($client){
        echo "<h1>EDIT CLIENT</h1>";
        echo "<form action='http://localhost/mvc/index.php?route=client&&action=update' method='POST'>
                <input type=text name='id' value='".$client['id']."'>
                <input type=text name='nome' value='".$client['nome']."'>
                <input type='text' name='endereco_id' value='".$client['endereco_id']."'>
                <input type='submit' value='update'>
              </form>";
    }
}

?>