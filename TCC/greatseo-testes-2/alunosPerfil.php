
<?php

session_start();

 include("Login_v13/init.php");
 include("Login_v13/check.php");
 include("conexao.php");

$id = $_SESSION['user_id'];

$sql = "SELECT * FROM dinheiro din INNER JOIN cliente cli ON din.Cod_Cli = cli.Cod_Cli INNER JOIN clixcat CliCat ON CliCat.Cod_Cli = cli.Cod_Cli INNER JOIN categoria cat ON CliCat.Cod_Categ = cat.Cod_Categ WHERE din.Cod_Auto = $id";
$con = $conn->query($sql) or die($conn->error);

$result = $conn->query($sql);

    setlocale(LC_TIME, 'portuguese'); 
    date_default_timezone_set('America/Sao_Paulo');
    $username = $_SESSION['user_name'];
$id = $_SESSION['user_id'];

$PDO = db_connect();
 
$sql = "SELECT * FROM autoescolas WHERE Cod_Auto = :p1";
$stmt = $PDO->prepare($sql);
 

$stmt->bindParam(':p1', $id);
 
$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// pega o primeiro usuário
$user = $users[0];

$username = $user['Nome_UsAu'];
$email = $user['Email'];
$cnpj = $user['CNPJ'];
$tel = $user['Telefone_C'];
?>
<!DOCTYPE html>
<html lang="en">

    
<head>
    
 

 <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title></title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    

    <!-- Bootstrap DataTable CSS-->  
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">  
    <!-- Bootstrap JS --> 
    <!--- teste---->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!--- fim teste--->

     <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script> 
    <script src="js/modernizr.custom.79639.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../bootstrap-nav-wizard.css">
         <link rel="stylesheet" type="text/css" href="../../../bootstrap-nav-wizard.css">
        <link rel="stylesheet" href="css/css.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css'>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
    <body>
    <style>
        .responsiveImagemPerfil {
          width: 40%;
          height: auto;
          border-radius: 50%; 
          border: 1px ;solid #000;
        }

    </style>

    
        
    <?php include("Topmenu2.html");?>


        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container box_1620">    
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->       
                        </div> 
                </nav>
            </div>
       </header>

        <!--================Header Menu Area =================-->
         <?php
                include("conexao.php");
                include("testefoto.php");

                $cod_aluno = $_POST["hdnCodAluno"];

                $sql = "SELECT * FROM cliente WHERE Cod_Cli = {$cod_aluno}";

                $result = $conn->query($sql);

                $cont = 0;

                $conn -> close();

                while($row = $result->fetch_assoc())
                {
                    $cont++;

                    $CodCli = $row['Cod_Cli'];

                    $Nome = $row['Nome_Cli'];

                    $email = $row['Email'];

                    $pass = $row['Pass'];

                    $cpf = $row['CPF'];

                    $data = $row['Datanasc'];

                    $end = $row['Endereco'];

                    $comp = $row['Complemento'];

                    $cep = $row['CEP'];

                    $tel = $row['Telefone'];

                    $fotop = $row['Foto_Perfil'];

                    $Bairro_Cliente = $row['Bairro'];

                    $Cidade_Cliente = $row['Cidade'];

                    $UF_Cliente = $row['UF'];

                    $Numero_Cliente = $row['Numero'];

                    $Info_Ad_Clinte = $row['Info_Ad'];

                }

                  if($cont == 0) {
            header('Location: alunos.php');
        } elseif($cont > 1){
            header('Location: alunos.php'); 
        }


?>
                    
        
        <!--================Inicio Novos Campos Formulario =================-->
<form id="formDadosAluno" name="formDadosAluno" method="post" action="AbaAjuda.php" enctype="multipart/form-data">
    <input type="hidden" id="hdnCodAluno" name="hdnCodAluno" value="<?php echo "$cod_aluno";?>">
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="font-size:20px"><b>Aluno - Código:<?php echo"$CodCli"; ?></b></div>  
            <div class="row">
                <div class="col-md-3">
                    <label class="" style="font-weight:normal">Nome Completo:</label><label class="font"  style="color: red">*</label>
                    <input type="text" onkeypress="return letras()" class="form-control" name="txtNomeCadastro" id="txtNomeCadastro" value="<?php echo"$Nome"; ?>">              
                </div>
                <div class="col-md-3">
                    <label class="" style="font-weight:normal">Email:</label><label class="font"  style="color: red">*</label>
                    <input type="text" class="form-control" name="txtEmail" id="txtEmail" value="<?php echo"$email"; ?>">              
                </div>
                <div class="col-md-3">
                    <label class="" style="font-weight:normal">Cpf:</label><label class="font"  style="color: red">*</label>
                    <input type="text" onchange="return TestaCPF(this)"  class="form-control" name="txtCpf" id="txtCpf" value="<?php echo"$cpf"; ?>">              
                </div>
                <div class="col-md-3">
                    <label class="" style="font-weight:normal">Data Nascimento:</label><label class="font"  style="color: red">*</label>
                    <input type="text" onblur="(validaData(this))" class="form-control data" name="txtData" id="txtData" value="<?php echo"$data"; ?>">              
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="" style="font-weight:normal">Telefone:</label><label class="font"  style="color: red">*</label>
                    <input type="text" class="form-control tel" name="txtTelefone" id="txtTelefone" value="<?php echo"$tel"; ?>">              
                </div>
                <div class="col-md-3">
                    <label class="" style="font-weight:normal">CEP:</label><label class="font"  style="color: red">*</label>
                    <input type="text" class="form-control" name="txtCep" id="txtCep" value="<?php echo"$cep"; ?>">              
                </div>
                <div class="col-md-3">
                    <label class="" style="font-weight:normal">Endereço:</label><label class="font"  style="color: red">*</label>
                    <input type="text" class="form-control" name="txtLogradouroCadastro" id="txtLogradouroCadastro" value="<?php echo"$end"; ?>">              
                </div>
                <div class="col-md-3">
                    <label class="" style="font-weight:normal">Bairro:</label><label class="font"  style="color: red">*</label>
                    <input type="text" class="form-control" name="txtBairroCadastro" id="txtBairroCadastro" value="<?php echo"$end"; ?>">              
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="" style="font-weight:normal">Cidade:</label><label class="font"  style="color: red">*</label>
                    <input type="text" SomenteNumero() class="form-control" name="txtCidadeCadastro" id="txtCidadeCadastro" value="<?php echo"$Cidade_Cliente";?>">              
                </div>
                <div class="col-sm-3">
                    <label class="" style="font-weight:normal;">UF:</label>
                    <select id="txtUfCadastro" name="txtUfCadastro" class="form-control">
                        <option value="0">Selecione*</option>
                        <option value="AC">AC- Acre</option> 
                        <option value="AL">AL- Alagoas</option>
                        <option value="AM">AM- Amazonas</option>
                        <option value="AP">AP- Amapá</option>
                        <option value="BA">BA- Bahia</option>
                        <option value="CE">CE- Ceará</option>
                        <option value="DF">DF- Distrito Federal</option>
                        <option value="ES">ES- Espírito Santo</option>
                        <option value="GO">GO- Goiás</option>
                        <option value="MA">MA- Maranhão</option>
                        <option value="MG">MG- Minas Gerais</option>
                        <option value="MS">MS- Mato Grosso do Sul</option>
                        <option value="MT">MT- Mato Grosso</option>
                        <option value="PA">PA- Pará</option>
                        <option value="PB">PB- Paraíba</option>
                        <option value="PE">PE- Pernambuco</option>
                        <option value="PI">PI- Piauí</option>
                        <option value="PR">PR- Paraná</option>
                        <option value="RJ">RJ- Rio de Janeiro</option>
                        <option value="RN">RN- Rio Grande do Norte</option>
                        <option value="RO">RO- Rondônia</option>
                        <option value="RR">RR- Roraima</option>
                        <option value="RS">RS- Rio Grande do Sul</option>
                        <option value="SC">SC- Santa Catarina</option>
                        <option value="SE">SE- Sergipe</option>
                        <option value="SP">SP- São Paulo</option>
                        <option value="TO">TO- Tocantins</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="" style="font-weight:normal">Numero:</label><label class="font"  style="color: red">*</label>
                    <input type="text" class="form-control" name="txtNumero" id="txtNumero" value="<?php echo"$Numero_Cliente";?>">              
                </div>
            </div>
            <div class="row"> 
                <div class="col-md-6">
                    <label class="" style="font-weight:normal">Complementos:</label><label class="font"  style="color: red">*</label>
                    <input type="text" class="form-control" name="txtComplemento" id="txtComplemento" value="<?php echo"$comp"; ?>">              
                </div>
                <div class="col-md-6">
                    <label class="" style="font-weight:normal">Informações Adicionais:</label><label class="font"  style="color: red">*</label>
                    <input type="text" class="form-control" name="txtInformacoesAdicionais" id="txtInformacoesAdicionais" value="Setado">              
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" style="">
                <img src="/web-app/web-app/TCC/greatseo-testes-2/Teste.jpg" alt="Avatar" style="border-radius: 50%; border: 1px solid #000; width: 50%; height: auto;" onclick="" class="responsiveImagemPerfil">
                </div>
                <div class="col-md-8">
                     <label class="" style="font-weight:normal">Digite Corpo do E-mail:</label><label class="font"  style="color: red">*</label>
                     <input type="text" class="form-control" id="txtComunicacao" name="txtComunicacao" value="" style="height:60%;width: 100%;font-size:15px">
                </div>
            </div>
            <div class="row"> 
                 <div class="col-md-6">
                     <input type="file"  class="form-control" id="fileFotoAlunoPerfil" name="fileFotoAlunoPerfil" value="" >
                </div>
                <div class="col-sm-2" style="height:30px"> 
                    <input type="hidden" value="0" id="hdnWhatsapp" name="hdnWhatsapp">
                        <button type="button" onclick="EnviaWhatsapp()" class="btn btn-success form-control">Whatsapp</button>  
                </div>
                <div class="col-sm-2">
                    <input type="hidden" id="hdnEmail" name="hdnEmail" value="0" >   
                        <button type="button" class="btn btn-warning form-control" onclick="EnviaEmail()">E-mail</button>
                </div>         
            </div>
            <div class="row">
            </div>

        </div>

            <div class="col-md-6"> 
                <input id="btnAtualizarDados" name="btnAtualizarDados" type="button" class="btn btn-primary btn-sm" style="width:135px;height:40px;font-size:15px;background-color: #000;" onclick="AtualizarDados()" value="Atualizar Dados"> 
            </div>
    </div>
</form>

     <!---================Inicio Novos Campos Formulario =================---->
       
        <?php include("footer.html");?>  
        
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/popup/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/theme.js"></script>
    </body>
    
</html>

<script>
    $(document).ready(function(){   
        $("#txtCpf").mask("000.000.000-00");
        $("#txtCep").mask("99999-999"); 
        $(".data").mask("9999-99-99");
        //O celular tem 2 variações 8 ou 9 dígitos então vamos usar js 
        $(".tel").mask("(00) 0000-00009")
        //blur é quando o usuário clicar fora da caixa
        $(".tel").blur(function(event){
        if ($(this).val().length == 15){
               $(".tel").mask("(00) 00000-0009")
           }else{
                $(".tel").mask("(00) 0000-00009")
            }
        });
    });
</script>

<script>
    function AtualizarDados(){
        alert("Teste");
    var codAluno = document.getElementById('hdnCodAluno').value;
    var Nome = document.getElementById('txtNomeCadastro').value;
    var Email = document.getElementById('txtEmail').value;
    var Cpf = document.getElementById('txtCpf').value;
    var Datanasc = document.getElementById('txtData').value;
    var Telefone = document.getElementById('txtTelefone').value;
    var Endereco = document.getElementById('txtLogradouroCadastro').value;
    var Cep = document.getElementById('txtCep').value;
    var Complemento = document.getElementById('txtComplemento').value;

    $.ajax({
      type : "POST",
      url : "http://localhost/web-app/tcc/greatseo-testes-2/ajax/update_DadosAluno.php", 
      data: { Nome: Nome, Email: Email, Cpf: Cpf, Datanasc: Datanasc, Telefone: Telefone, Endereco: Endereco, Cep: Cep, Complemento: Complemento, codAluno: codAluno,  },
      success : function(response) {
        
          
    },
      error : function(response) {
        console.log("error..!! - ajax insere aulas");
      }
    });
}
</script>

<script>
    function EnviaEmail(){
        alert("Teste");
    var CodCli = document.getElementById('hdnCodAluno').value
    var Nome = document.getElementById('txtNomeCadastro').value;
    var Email = document.getElementById('txtEmail').value;
    var CorpoEmail = document.getElementById('txtComunicacao').value;
    alert(CodCli);
    $.ajax({
      type : "POST",
      url : "http://localhost/web-app/tcc/greatseo-testes-2/TesteEmail.php", 
      data: { Nome: Nome, Email: Email, CorpoEmail: CorpoEmail, CodCli:CodCli ,},

      success : function(response) {
          
    },
      error : function(response) {
        console.log("error..!! - ajax insere aulas");

      }
    });

}
</script>

<script>
    function validaData(campo){
        var erro = true;
        if(campo.value != ''){
            var strData = campo.value;
            var diaVALIDO = strData.substr(0,2);
            var mesVALIDO = strData.substr(3,2);
            var anoVALIDO = strData.substr(6,4);
            var dataInt = new String();
            dataInt = "";
            
            if(diaVALIDO > 31 || diaVALIDO == 00){
                alert("Dia inválido!");
                campo.value = dataInt;
                return false;
            }
            dataInt = diaVALIDO + '/';
    
                        
            if(mesVALIDO > 12 || mesVALIDO == 00){
                alert("Mes inválido!");
                campo.value = dataInt;
                return false;
            }
            dataInt  = dataInt  + mesVALIDO + '/';
            
            if(anoVALIDO < 1700 || anoVALIDO > 2021){
                alert("Ano inválido!");
                campo.value = dataInt
                return false;
            }           
            dataInt  = dataInt  + year;
    
            
            if(mesVALIDO == 02 && year%4 == 00){
                if(diaVALIDO > 29 || diaVALIDO == 00){
                    alert("O mês de fevereiro em um ano bissexto so possui 29 dias!");
                    campo.value = "";
                    return false;
                }
            }
    
            if(mesVALIDO == 02 && year%4 != 00){
                if(diaVALIDO > 28){
                    alert("O mês de fevereiro so possui 28 dias!");
                    campo.value = ""
                    return false;
                }
            }
    
            if(mesVALIDO != 01 || mesVALIDO != 03 || mesVALIDO != 05 || mesVALIDO != 07 || mesVALIDO != 08 || mesVALIDO != 10 || mesVALIDO != 12){
                if(diaVALIDO > 31){
                alert("O Mês informado não possui 31 dias!")
                campo.value = ""
                return false;
                }
            }
            campo.value = dataInt;
        }
    }
</script>

<script>
    function SomenteNumero(){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
        if (tecla==8 || tecla==0) return true;
    else  return false;
    }
    }
</script>

<script>
    function TestaCPF(elemento) {
     cpf = elemento.value;
     cpf = cpf.replace(/[^\d]+/g, '');
     if (cpf == ''){
     elemento.value = ""
    return alert("CPF Invalido");
    
     }
     
     
    
    
     // Elimina CPFs invalidos conhecidos    
     if (cpf.length != 11 ||
       cpf == "00000000000" ||
       cpf == "11111111111" ||
       cpf == "22222222222" ||
       cpf == "33333333333" ||
       cpf == "44444444444" ||
       cpf == "55555555555" ||
       cpf == "66666666666" ||
       cpf == "77777777777" ||
       cpf == "88888888888" ||
    cpf == "99999999999")
    {
    elemento.value = "";
    return alert("CPF Invalido");
    
       }
         
     // Valida 1o digito
     add = 0;
     for (i = 0; i < 9; i++)
       add += parseInt(cpf.charAt(i)) * (10 - i);
     rev = 11 - (add % 11);
     if (rev == 10 || rev == 11)
       rev = 0;
     if (rev != parseInt(cpf.charAt(9)))
     {
    elemento.value = "";
    return alert("CPF Invalido");
    
     }
        //elemento.style.backgroundColor = "red";
     // Valida 2o digito
     add = 0;
     for (i = 0; i < 10; i++)
       add += parseInt(cpf.charAt(i)) * (11 - i);
     rev = 11 - (add % 11);
     if (rev == 10 || rev == 11)
       rev = 0;
     if (rev != parseInt(cpf.charAt(10)))
     {
    elemento.value = "";  
    return alert("CPF Inválido !");
    
     }
       //elemento.style.backgroundColor = "red";
    //elemento.style.backgroundColor = "blue";
    }
    
</script>

<script type="text/javascript">
    function letras(){
        tecla = event.keyCode;
        if (tecla >= 48 && tecla <= 57){
            return false;
        }else{
            return true;
        }
    }
</script>

<script>
    $("#txtCep").focusout(function(){
        //Início do Comando AJAX
    
        $.ajax({
            //O campo URL diz o caminho de onde virá os dados
            //É importante concatenar o valor digitado no CEP
            url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
            //Aqui você deve preencher o tipo de dados que será lido,
            //no caso, estamos lendo JSON.
            dataType: 'json',
            //SUCESS é referente a função que será executada caso
            //ele consiga ler a fonte de dados com sucesso.
            //O parâmetro dentro da função se refere ao nome da variável
            //que você vai dar para ler esse objeto.
            success: function(resposta){
                //Agora basta definir os valores que você deseja preencher
                //automaticamente nos campos acima.
                if(resposta.erro == true)
                {
                    alert("CEP não encontrado");
                }else{
                    $("#txtLogradouroCadastro").val(resposta.logradouro);
                    $("#txtBairroCadastro").val(resposta.bairro);
                    $("#txtCidadeCadastro").val(resposta.localidade);
                    $("#txtUfCadastro").val(resposta.uf);
                    $("#txtNumeroProfissional").focus();
                }
                //Vamos incluir para que o Número seja focado automaticamente
                //melhorando a experiência do usuário
            },
            
            
        });
    });
</script>

<script>
    $("#txtCep").focusout(function(){
        //Início do Comando AJAX
    
        $.ajax({
            //O campo URL diz o caminho de onde virá os dados
            //É importante concatenar o valor digitado no CEP
            url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
            //Aqui você deve preencher o tipo de dados que será lido,
            //no caso, estamos lendo JSON.
            dataType: 'json',
            //SUCESS é referente a função que será executada caso
            //ele consiga ler a fonte de dados com sucesso.
            //O parâmetro dentro da função se refere ao nome da variável
            //que você vai dar para ler esse objeto.
            success: function(resposta){
                //Agora basta definir os valores que você deseja preencher
                //automaticamente nos campos acima.
                if(resposta.erro == true)
                {
                    alert("CEP não encontrado");
                }else{
                    $("#txtLogradouroCadastro").val(resposta.logradouro);
                    $("#txtBairroCadastro").val(resposta.bairro);
                    $("#txtCidadeCadastro").val(resposta.localidade);
                    $("#txtUfCadastro").val(resposta.uf);
                    $("#txtNumeroProfissional").focus();
                }
                //Vamos incluir para que o Número seja focado automaticamente
                //melhorando a experiência do usuário
            },
            
            
        });
    });
</script>

<script>
     function EnviaWhatsapp(){
        alert("teste");
    var Tel = document.getElementById('txtTelefone').value;
    Tel=Tel.replace(/\D/g,"");
    
    window.open('https://wa.me/55'+Tel);
}
</script>

   
   
