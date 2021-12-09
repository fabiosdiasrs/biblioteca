<?php 
/*
    @Autor Fábio S. Dias
*/
    include "conecta.php";
    
    if (isset($_POST["botao"])) {
        $nome         = $_POST['nome'];
        
        $sql          = "INSERT INTO area (nome)
                        VALUES ('$nome')";
        $resultado    = pg_query($conexao, $sql);
        if($resultado){
			echo "<script>alert('Cadastro realizado com sucesso!'); location= './cadastro_area.php';</script>";
		}else{
			echo "<script>alert('Erro ao inserir as informações no banco de dados!'); location= './cadastro_area.php';</script>";
		}
    }

?>