<?php 
    /*
    @Autor Fábio S. Dias
*/
    include "conecta.php";
    
    if (isset($_POST["botao"])) {
        $titulo         = $_POST['titulo'];
		$status        = $_POST['status'];
		$autor          = $_POST['autor'];
		$id_area    = $_POST['id_area'];
        
        $sql          = "INSERT INTO livro (titulo, status, autor, id_area)
                        VALUES ('$titulo', '$status', '$autor', '$id_area')";
        $resultado    = pg_query($conexao, $sql);
        if($resultado){
			echo "<script>alert('Cadastro realizado com sucesso!'); location= './cadastro_livro.php';</script>";
		}else{
			echo "<script>alert('Erro ao inserir as informações no banco de dados!'); location= './cadastro_livro.php';</script>";
		}
    }

?>