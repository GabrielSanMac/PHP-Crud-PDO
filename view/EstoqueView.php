<?php 

class EstoqueView {
    public function showListEstoque($estoque) {
        echo '<h1>ESTOQUE</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>LIVRO</th>
                    <th>LIVRARIA</th>
                    <th>QUANTIDADE</th>
                    <th colspan=2>ACTION</th>
                </tr>';
        for($i = 0; $i<count($estoque);$i++){
            echo "<tr>";
            echo "<td>".$estoque[$i]['id']."</td>";
            echo "<td>".$estoque[$i]['livro_id']."</td>";
            echo "<td>".$estoque[$i]['livraria_id']."</td>";
            echo "<td>".$estoque[$i]['quantidade_em_estoque']."</td>";
            echo "<td><a class=btnEdit href='index.php?route=estoque&&id=".$estoque[$i]['id']."&&action=edit'>EDIT</a></td>";
            echo "<td><a class=btnRemove href='index.php?route=estoque&&id=".$estoque[$i]['id']."&&action=delete'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='index.php?route=estoque&&action=insert'>NEW</a>";
    }

    public function showInsertForm() {
        echo "<h1>INSERT ESTOQUE</h1>";
        echo "<form method='POST' action='index.php?route=estoque&&action=insert'>
            NEW LIVRO <input type='text' name='livro_id' required><br>
            NEW LIVRARIA <input type='text' name='livraria_id' required><br>
            NEW QUANTIDADE <input type='text' name='qtd' required><br>
            <input type='submit' value='insert'>
            <a href='index.php?route=estoque&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($estoque) {
        echo "<h1>EDIT CLIENT</h1>";
        echo "<form action='index.php?route=estoque&&action=update' method='POST'>
                <input type=hidden name='id' value='".$estoque['id']."'>
                NEW LIVRO <input type=text name='livro_id' value='".$estoque['livro_id']."'>
                NEW LIVRARIA <input type=text name='livraria_id' value='".$estoque['livraria_id']."'>
                NEW QTD <input type=text name='qtd' value='".$estoque['quantidade_em_estoque']."'>
                <input type='submit' value='update'>
              </form>";
    }
}

?>