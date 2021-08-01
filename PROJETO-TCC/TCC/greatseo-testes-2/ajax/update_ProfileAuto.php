       <!-------------------------Query---------------------------->
       <?php
                include("../conexao.php");
                include("../testefoto.php");
                $cod_auto = $_POST["CodAuto"];
                $Nome = $_POST["Nome"];
                $NomeUser   = $_POST["NomeUser"];
                $email = $_POST["Email"];
                $cnpj = $_POST["cnpj"];
                $end = $_POST["Endereco"];
                $cep = $_POST["Cep"];
                $comp = $_POST["Complemento"];
                $tel = $_POST["Telefone"];
                $tel2 = $_POST["TelefoneFix"];
                $numero = $_POST["Numero"];
                $sql = ("UPDATE autoescolas SET 
                Nome_Auto = '$Nome',
                Nome_UsAu = '$NomeUser', 
                Email = '$email',
                CNPJ = '$cnpj',
                Endereco = '$end',
                CEP = '$cep',
                Complemento = '$comp',
                Telefone_C = '$tel',
                Telefone_Fix = '$tel2',
                Numero = '$numero'
                WHERE Cod_Auto = $cod_auto");

                if ($conn->query($sql) === TRUE) {
                   header('Location: ../alunos.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
    
                
               
                $conn -> close();

        ?>
       <!-------------------------Query----------------------------> 
       
 