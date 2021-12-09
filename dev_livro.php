<?php
/*
    @Autor Fábio S. Dias
*/
?>
<?php 
    include "conecta.php";
    
    if (isset($_POST["botao"])) {
		$id_livro               = $_POST['checkok'];
		
        for ($i=0; $i < count($id_livro); $i++) { 
            $sel = "UPDATE livro SET status = 't' WHERE id = '$id_livro[$i]'";
            $result = pg_query($conexao, $sel);
            
            $sql= "DELETE FROM reserva WHERE id_livro = '$id_livro[$i]'";
            $resultado        = pg_query($conexao, $sql);
        }
        
        
        if($resultado AND $result){
			echo "<script>alert('Devolução realizada com sucesso!');location= './devolucao_livro.php';</script>";
		}else{
			echo "<script>alert('Erro ao realizar a devolução do livro!');location= './devolucao_livro.php';</script>";
		}
		
    }
?>