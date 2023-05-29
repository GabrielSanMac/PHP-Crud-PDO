<?php 

class CompraView {
    public function showListCompra($compra) {
        echo '<h1>COMPRAS</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>DATA COMPRA</th>
                    <th>VALOR</th>
                    <th>LIVRO</th>
                    <th>CLIENTE</th>
                </tr>';
        for($i = 0; $i<count($compra);$i++){
            echo "<tr>";
            echo "<td>".$compra[$i]['id']."</td>";
            echo "<td>".$compra[$i]['data_compra']."</td>";
            echo "<td>".$compra[$i]['valor']."</td>";
            echo "<td>".$compra[$i]['livro_id']."</td>";
            echo "<td>".$compra[$i]['cliente_id']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='index.php?route=compra&&action=insert'>NOVA COMPRA</a>";
    }

    public function showInsertForm() {
        echo "<h1>INSERT FORM AUTHOR</h1>";
        echo "<form method='POST' action='index.php?route=compra&&action=insert'>
            NEW DATA COMPRA <input type='date' name='data_compra' required><br>
            NEW VALOR <input type='text' name='valor' required><br>
            NEW LIVRO ID <input type='text' name='livro_id' required><br>
            NEW CLIENTE ID <input type='text' name='cliente_id' required><br>
            <input type='submit' value='insert'>
            <a href='index.php?route=compra&&action=list'>BACK</a>
         </form>";
    }
}

?>