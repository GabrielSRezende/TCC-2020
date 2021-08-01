<?php
                session_start();
                $id = $_SESSION['user_id'];
                include("conexao.php");

                $Nome = $_POST["nomeIns"];
                $cpf = $_POST["cpfIns"];
                $data = $_POST["datanascIns"];


                $sql = ("INSERT INTO instrutor ( Cod_Auto, Nome, CPF, Datanasc ) VALUES ('$id', '$Nome', '$cpf', '$data')");

                if ($conn->query($sql) === TRUE) {
                     
                   header('Location: profile.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
    
                
               
                $conn -> close();

?>