<?php 
			session_start();
            include("../login/init.php");
            include("../login/check.php");
            include("../conexao.php"); 
            $username = $_SESSION['user_name'];
            $id = $_SESSION['cod_cli']; //cliente
            $valor = $_POST['valor'];
            $CodAuto = $_POST['teste'];
            $CodCateg = 18;
            $DATE = '2020-10-30';
            echo $id;
           
            //UPDATE PARA COLOCAR O COD DA AUTOESCOLA NO CLIENTE E ALTERAR STATUS PARA ATIVO
            $sql1 = "UPDATE cliente SET Cod_Auto = '$CodAuto', Status = 'A' WHERE Cod_Cli = '$id'";
            $result = $conn->query($sql1);

            //INSERIR CLI x CAT
            $sql2 = "INSERT INTO clixcat ( Cod_Auto, Cod_Cli, Cod_Categ, Aulas) VALUES ('$CodAuto', '$id', 18, 20)";
            $conn->query($sql2);

            //INSERIR ENTRADA 
            $sql3 = "INSERT INTO dinheiro ( Cod_Auto, Cod_Cli, Entrada, Data) VALUES ('$CodAuto', '$id', '$valor', '$DATE')";
            $conn->query($sql3);

            header('Location: index.php');
			
?>