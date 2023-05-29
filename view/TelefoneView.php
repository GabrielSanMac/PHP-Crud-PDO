<?php 

class TelefoneView {
    public function showListTelefone($telefone,$cliente) {
        echo '<h1>TELEFONE</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>NUMERO</th>
                    <th>CLIENTE</th>
                    <th colspan=2>ACTION</th>
                </tr>';
        for($i = 0; $i<count($telefone);$i++){
            echo "<tr>";
            echo "<td>".$telefone[$i]['id']."</td>";
            echo "<td>".$telefone[$i]['numero_telefone']."</td>";
            echo "<td>".$cliente->getClienteById($telefone[$i]['cliente_id'])['nome']."</td>";
            echo "<td><a class=btnEdit href='index.php?route=telefone&&id=".$telefone[$i]['id']."&&action=edit'>EDIT</a></td>";
            echo "<td><a class=btnRemove href='index.php?route=telefone&&id=".$telefone[$i]['id']."&&action=delete'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='index.php?route=telefone&&action=insert'>NEW</a>";
    }

    public function showInsertForm($cliente) {
        echo "<h1>INSERT FORM TELEFONE</h1>";
        echo "<form method='POST' action='index.php?route=telefone&&action=insert'>
            NEW NUMERO <input type='text' name='numero_telefone' required><br>
            NEW CLIENTE <select name='cliente_id'>" ?> <?php
            for($i = 0; $i < count($cliente); $i++){
                echo "<option value=".$cliente[$i]['id'].">".$cliente[$i]['nome']."</option>";
            }
            echo "<input type='submit' value='insert'>
            <a href='index.php?route=telefone&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($telefone,$cliente) {
        echo "<h1>EDIT TELEFONE</h1>";
        echo "<form action='index.php?route=telefone&&action=update' method='POST'>
                <input type=hidden name='id' value='".$telefone['id']."'>
                <input type=text name='numero_telefone' value='".$telefone['numero_telefone']."'>
                NEW CLIENTE <select name='cliente_id'>" ?> <?php
                for($i = 0; $i < count($cliente); $i++){
                    if($cliente[$i]['id'] == $telefone['cliente_id']){
                        echo "<option value=".$cliente[$i]['id']." selected='selected'>".$cliente[$i]['nome']."</option>";
                    } else {
                        echo "<option value=".$cliente[$i]['id'].">".$cliente[$i]['nome']."</option>";
                    }
                }
                echo " </select>
                <input type='submit' value='update'>
              </form>";
    }
}

?>