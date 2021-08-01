       <!-------------------------Query---------------------------->
       <?php
                include("../conexao.php");
                include("../testefoto.php");
                $cod_aluno = $_POST["hdnCodAluno"];
                $Nome = $_POST["txtNomeCadastro"];
                $email = $_POST["txtEmail"];
                $cpf = $_POST["txtCpf"];
                $data = $_POST["txtData"];
                $end = $_POST["txtEndereco"];
                $cep = $_POST["txtCep"];
                $comp = $_POST["txtComplemento"];
                $tel = $_POST["txtTelefone"];

                $sql = ("UPDATE cli_users SET 
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
       
 