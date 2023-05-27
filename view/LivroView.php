<?php 

class LivroView {
    public function showListLivro($livros) {
        echo '<h1>LIVRO</h1><br>';
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>ASSUNTO</th>
                    <th>DATA PUBLICAÇÃO</th>
                    <th>PREÇO (R$)</th>
                    <th>ISBN</th>
                    <th>AUTOR ID</th>
                    <th colspan=2>ACTION</th>
                </tr>';
        for($i = 0; $i<count($livros);$i++){
            echo "<tr>";
            echo "<td>".$livros[$i]['id']."</td>";
            echo "<td>".$livros[$i]['titulo']."</td>";
            echo "<td>".$livros[$i]['assunto']."</td>";
            echo "<td>".$livros[$i]['ano_publicacao']."</td>";
            echo "<td>".$livros[$i]['preco']."</td>";
            echo "<td>".$livros[$i]['ISBN']."</td>";
            echo "<td>".$livros[$i]['autor_id']."</td>";
            echo "<td><a class=btnEdit href='index.php?route=livro&&id=".$livros[$i]['id']."&&action=edit'>EDIT</a></td>";
            echo "<td><a class=btnRemove href='index.php?route=livro&&id=".$livros[$i]['id']."&&action=delete'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class=btnAdd href='index.php?route=livro&&action=insert'>NEW</a>";
    }

    public function showInsertForm($autor) {
        echo "<h1>INSERT FORM AUTHOR</h1>";
        echo "<form method='POST' action='index.php?route=livro&&action=insert'>
            TITULO <input type='text' name='titulo' required><br>
            ASSUNTO <textarea name='assunto' required></textarea><br>
            DATA PUBLICADO <input type='text' name='ano_publicado' required><br>
            PREÇO <input type='text' name='preco' required><br>
            ISBN <input type='text' name='ISBN' required><br>
            AUTOR ID <input type='text' name='autor_id' required><br>
            <input type='submit' value='insert'>
            <a href='index.php?route=livro&&action=list'>BACK</a>
         </form>";
    }

    public function showUpdateForm($livro) {
        echo "<h1>EDIT LIVRO</h1>";
        echo "<form action='index.php?route=livro&&action=update' method='POST'>
                <input type=hidden name='id' value='".$livro['id']."'>
                <input type=text name='titulo' value='".$livro['titulo']."'>
                <textarea name='assunto'>'".$livro['assunto']."'</textarea>
                <input type=text name='ano_publicacao' value='".$livro['ano_publicacao']."'>
                <input type=number name='preco' value='".$livro['preco']."'>
                <input type=number name='ISBN' value='".$livro['ISBN']."'>
                <input type=number name='autor_id' value='".$livro['autor_id']."'>
                <input type='submit' value='update'>
                <a href='index.php?route=livro&&action=list'>BACK</a>
              </form>";
    }
}

?>