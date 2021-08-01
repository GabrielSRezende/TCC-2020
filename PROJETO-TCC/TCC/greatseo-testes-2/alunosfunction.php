 <?php
        include("conexao.php");
        include("alunosPerfil.php");
        
        echo "$CodCli";

        /* $CodCli2 = $CodCli;
        $info = $_POST["info"];
        $sql = "INSERT INTO cli_infos (Descricao) VALUES ('$info')";

        if($conn->query($sql)===TRUE){

            $sql2 = "SELECT * FROM cli_infos WHERE Descricao = '$info'";
                $result2 = $conn->query($sql2);               
                while($row2 = $result2->fetch_assoc())
                {$CodInfo = $row2['Cod_Info'];}
        
            $sql3 = "INSERT INTO use_inf (Cod_Cli, Cod_Info) VALUES ('$cli','$CodInfo')";
            if($conn->query($sql3)===TRUE){echo "foi";}}

               $sql4 = "SELECT Descricao FROM cli_infos INNER JOIN use_inf WHERE (Cod_Cli = '$CodCli') AND (Cod_Info = '$CodInfo')";

                    $result = $conn->query($sql4);

                    $conn -> close();

                    while($row = $result->fetch_assoc())
                    {

                        $Nome = $row['Nome_Cli'];

                        $Descricao = $row['Descricao'];

                        echo "$Nome <br/>";
                        echo "$Descricao <br/>";
                        

                }
            }
        } else {echo "MERDA";}*/
?>