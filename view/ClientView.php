<?php 

class ClientView {
    public function showClients($clients){
        echo '<h1>CLIENT LIST</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>ID ADDRESS</th>
                    <th>ACTION</th>
                </tr>';
        for($i = 0; $i<count($clients);$i++){
            echo "<tr>";
            echo "<td>".$clients[$i]['id']."</td>";
            echo "<td>".$clients[$i]['nome']."</td>";
            echo "<td>".$clients[$i]['endereco_id']."</td>";
            echo "<td><a href='http://localhost/mvc/index.php?route=client&&id=".$clients[$i]['id']."&&action=edit'>EDIT CLIENT</a></td>";
            echo "<td><a href='http://localhost/mvc/index.php?route=client&&id=".$clients[$i]['id']."&&action=delete'>DELETE CLIENT</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a href='http://localhost/mvc/index.php?route=client&&action=insert'>INSERT NEW CLIENT</a>";
    }

    public function showInsertForm(){
        echo "<h1>INSERT FORM CLIENT</h1>";
        echo 
        "<form method='POST' action='index.php?route=client&&action=insert'>
            <input type='text' name='name' required><br>
            <input type='text' name='addressId' required><br>
            <input type='submit' value='insert'>
            <a href='http://localhost/mvc/index.php?route=client&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($client){
        echo "<h1>EDIT CLIENT</h1>";
        echo $client['nome'];
        echo "<form action='http://localhost/mvc/index.php?route=client&&action=update' method='POST'>
                <input type=text name='id' value='".$client['id']."'>
                <input type=text name='nome' value='".$client['nome']."'>
                <input type='text' name='endereco_id' value='".$client['endereco_id']."'>
                <input type='submit' value='update'>
              </form>";
    }
}

?>