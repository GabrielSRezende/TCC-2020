<?php
                session_start();
                $id = $_SESSION['user_id'];
                include("conexao.php");

                $desc = $_POST["desc"];
                $marca = $_POST["marca"];
                $model = $_POST["model"];
                $cor = $_POST["cor"];
                $placa = $_POST["placa"];


                $sql = ("INSERT INTO veiculo (Cod_Auto, Descricao, Marca, Modelo, Cor, Placa) VALUES ('$id', '$desc', '$marca', '$model', '$cor', '$placa')");

                if ($conn->query($sql) === TRUE) {
                     
                   header('Location: profile.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
    
                
               
                $conn -> close();

?>