       <!-------------------------Query---------------------------->
       <?php
                include("../conexao.php");
                include("../testefoto.php");
                $cod_aluno = $_POST["codAluno"];
                $Nome = $_POST["Nome"];
                $email = $_POST["Email"];
                $cpf = $_POST["Cpf"];
                $data = $_POST["Datanasc"];
                $end = $_POST["Endereco"];
                $cep = $_POST["Cep"];
                $comp = $_POST["Complemento"];
                $tel = $_POST["Telefone"];

                $sql = ("UPDATE cliente SET 
                Nome_Cli = '$Nome', 
                Email = '$email',
                CPF = '$cpf',
                Datanasc = '$data',
                Endereco = '$end',
                Complemento = '$comp',
                CEP = '$cep',
                Telefone = '$tel'
                WHERE Cod_Cli = $cod_aluno");

                if ($conn->query($sql) === TRUE) {
                   header('Location: ../alunos.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
    
                
               
                $conn -> close();

        ?>
       <!-------------------------Query----------------------------> 
       
 