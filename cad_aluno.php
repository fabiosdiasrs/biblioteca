<?php 
/*
    @Autor Fábio S. Dias
*/
    include "conecta.php";
    
    if (isset($_POST["botao"])) {
        $nome         = $_POST['nome'];
		$email        = $_POST['email'];
		$cpf          = $_POST['cpf'];
		$data_nasc    = $_POST['data_nasc'];
        
        $sql          = "INSERT INTO aluno (nome, email, cpf, data_nasc)
                        VALUES ('$nome', '$email', '$cpf', '$data_nasc')";
        $resultado    = pg_query($conexao, $sql);
        if($resultado){
			echo "<script>alert('Cadastro realizado com sucesso!'); location= './cadastro_aluno.php';</script>";
		}else{
			echo "<script>alert('Erro ao inserir as informações no banco de dados!'); location= './cadastro_aluno.php';</script>";
		}
    }

?>