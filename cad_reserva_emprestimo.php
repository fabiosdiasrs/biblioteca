<?php 
 /*
    @Autor Fábio S. Dias
*/
    include "conecta.php";
    
    if (isset($_POST["botao"])) {
        $data_retirada          = $_POST['data_retirada'];
		$data_entrega           = $_POST['data_entrega'];
		$status                 = $_POST['status'];
		$matricula              = $_POST['matricula'];
		$id_livro               = $_POST['id_livro'];
		
		
        for ($i=0; $i < count($id_livro); $i++) { 
            $sql              = "INSERT INTO reserva (data_retirada, data_entrega, status, matricula, id_livro)
                            VALUES ('$data_retirada', '$data_entrega', '$status', '$matricula','$id_livro[$i]')";
            $resultado        = pg_query($conexao, $sql);
        
            $sel = "UPDATE livro SET status = 'f' WHERE id = '$id_livro[$i]'";
            $result = pg_query($conexao, $sel);
        }
        
        
        if($resultado AND $result){
			echo "<script>alert('Emprestimo realizado com sucesso!'); location= './reserva_emprestimo.php';</script>";
		}else{
			echo "<script>alert('Erro ao inserir as informações no banco de dados!'); location= './reserva_emprestimo.php';</script>";
		}
    }
?>