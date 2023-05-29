<?php 

class CarterinhaView {
    public function showListCarterinha($carterinha,$cliente,$instituicao) {
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
            echo "<td>".$instituicao->getInstituicaoById($carterinha[$i]['instituicao_id'])['nome_instituicao']."</td>";
            echo "<td>".$cliente->getClienteById($carterinha[$i]['cliente_id'])['nome']."</td>";
            echo "<td><a class=btnEdit href='index.php?route=carterinha&&id=".$carterinha[$i]['id']."&&action=edit'>EDIT</a></td>";
            echo "<td><a class=btnRemove href='index.php?route=carterinha&&id=".$carterinha[$i]['id']."&&action=delete'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='index.php?route=carterinha&&action=insert'>NEW</a>";
    }

    public function showInsertForm($cliente,$instituicao) {
        echo "<h1>NOVA CARTERINHA</h1>";
        echo "<form method='POST' action='index.php?route=carterinha&&action=insert'>
            <label for='data_validade'>Data Validade</label>
            <input type='date' name='data_validade' required><br>
            <label for='instituicao_id'>Instituição</label>
            <select name='instituicao_id'>
            ";?><?php 
            for($i = 0; $i < count($instituicao);$i++){
                echo "<option value=".$instituicao[$i]['id'].">".$instituicao[$i]['nome_instituicao']."</option>";
            }
            echo"
            </select>
            <label for='cliente_id'>Cliente</label>
            <select name='cliente_id'>
            ";?><?php 
            for($i = 0; $i < count($cliente);$i++){
                echo "<option value=".$cliente[$i]['id'].">".$cliente[$i]['nome']."</option>";
            }
            echo"
            </select>
            <input type='submit' value='insert'>
            <a class='btnBack' href='index.php?route=carterinha&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($carterinha,$cliente,$instituicao) {
        echo "<h1>ATUALIZAR CARTEIRINHA</h1>";
        echo "<form action='index.php?route=carterinha&&action=update' method='POST'>
                <input type=hidden name='id' value='".$carterinha['id']."'>
                <label for='data_validade'>Data Validade</label>
                <input type=date name='data_validade' value='".$carterinha['data_validade']."'>
                <label for='instituicao_id'>Instituição</label>
                <select name='instituicao_id'>" ?> <?php
                for($i = 0; $i < count($instituicao); $i++){
                    if($instituicao[$i]['id'] == $carterinha['instituicao_id']){
                        echo "<option value=".$instituicao[$i]['id']." selected='selected'>".$instituicao[$i]['nome_instituicao']."</option>";
                    } else {
                        echo "<option value=".$instituicao[$i]['id'].">".$instituicao[$i]['nome_instituicao']."</option>";
                    }
                }
                echo " </select>
                <label for='cliente_id'>Cliente</label>
                <select name='cliente_id'>" ?> <?php
                for($i = 0; $i < count($cliente); $i++){
                    if($cliente[$i]['id'] == $carterinha['cliente_id']){
                        echo "<option value=".$cliente[$i]['id']." selected='selected'>".$cliente[$i]['nome']."</option>";
                    } else {
                        echo "<option value=".$cliente[$i]['id'].">".$cliente[$i]['nome']."</option>";
                    }
                }
                echo " </select>
                <input type='submit' value='update'>
                <a class='btnBack' href='index.php?route=carterinha&&action=list'>BACK</a>
              </form>";
    }
}

?>