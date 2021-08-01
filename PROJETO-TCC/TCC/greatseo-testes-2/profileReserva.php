<?php

session_start();

 include("Login_v13/init.php");
 include("Login_v13/check.php");
 include("conexao.php");

$id = $_SESSION['user_id'];



$sql = "SELECT * FROM cliente WHERE Cod_Auto = $id";

$con = $conn->query($sql) or die($conn->error);
$con2 = $conn->query($sql) or die($conn->error);

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

    <?php
                include("conexao.php");
                include("testefoto.php");

               

                $sql = "SELECT * FROM autoescolas WHERE Cod_Auto =  $id";

                $result = $conn->query($sql);

                $cont = 0;

                $conn -> close();

                while($row = $result->fetch_assoc())
                {
                    $cont++;

                    $CodAuto = $row['Cod_Auto'];

                    $Nome = $row['Nome_Auto'];

                    $NomeUs = $row['Nome_UsAu'];

                    $email = $row['Email'];

                    $pass = $row['Pass'];

                    $cnpj = $row['CNPJ'];

                    $end = $row['Endereco'];

                    $comp = $row['Complemento'];

                    $cep = $row['CEP'];

                    $tel = $row['Telefone_C'];

                    $tel_Fix = $row['Telefone_Fix'];

                    $Bairro_Cliente = $row['Bairro'];

                    $Cidade_Cliente = $row['Cidade'];

                    $UF_Cliente = $row['UF'];

                    $Numero_Cliente = $row['Numero'];

                    $DescricaoAuto = $row['Descricao'];

                }

                  if($cont == 0) {
            header('Location: alunos.php');
        } elseif($cont > 1){
            header('Location: alunos.php'); 
        }


?>


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
                    
        
        <!--================Inicio Novos Campos Formulario =================-->
<form id="formDadosAluno" name="formDadosAluno" method="post" action="AbaAjuda.php" enctype="multipart/form-data">
    <input type="hidden" id="hdnCodAuto" name="hdnCodAuto" value="<?php echo "$id";?>">
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="font-size:20px"><b>AutoEscola - Código:<?php echo"$id"; ?></b></div>  
            <div class="row">
                <div class="col-md-4">
                    <label class="" style="font-weight:normal">Razão Social:</label><label class="font"  style="color: red">*</label>
                    <input type="text" onkeypress="return letras()" class="form-control" name="txtNomeCadastro" id="txtNomeCadastro" value="<?php echo"$Nome"; ?>">              
                </div>
                <div class="col-md-4">
                    <label class="" style="font-weight:normal">Email:</label><label class="font"  style="color: red">*</label>
                    <input type="text" class="form-control" name="txtEmail" id="txtEmail" value="<?php echo"$email"; ?>">              
                </div>
                <div class="col-md-4">
                    <label class="" style="font-weight:normal">Cpf:</label><label class="font"  style="color: red">*</label>
                    <input type="text" onchange="return TestaCPF(this)"  class="form-control" name="txtCnpj" id="txtCnpj" value="<?php echo"$cnpj"; ?>">              
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="" style="font-weight:normal">Nome Usuario:</label><label class="font"  style="color: red">*</label>
                    <input type="text" onkeypress="return letras()" class="form-control" name="txtNomeCadastroUser" id="txtNomeCadastroUser" value="<?php echo"$NomeUs"; ?>">              
                </div>
                  <div class="col-md-3">
                    <label class="" style="font-weight:normal">Telefone Fixo:</label><label class="font"  style="color: red">*</label>
                    <input type="text" class="form-control tel" name="txtTelefone2" id="txtTelefone2" value="<?php echo"$tel_Fix"; ?>">              
                </div>
                 <div class="col-md-3">
                    <label class="" style="font-weight:normal">Telefone Celular:</label><label class="font"  style="color: red">*</label>
                    <input type="text" class="form-control tel" name="txtTelefone" id="txtTelefone" value="<?php echo"$tel"; ?>">              
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="" style="font-weight:normal">CEP:</label><label class="font"  style="color: red">*</label>
                    <input type="text" class="form-control" name="txtCep" id="txtCep" value="<?php echo"$cep"; ?>">              
                </div>
                <div class="col-md-4">
                    <label class="" style="font-weight:normal">Endereço:</label><label class="font"  style="color: red">*</label>
                    <input type="text" class="form-control" name="txtLogradouroCadastro" id="txtLogradouroCadastro" value="<?php echo"$end"; ?>">              
                </div>
                <div class="col-md-4">
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
                <br>
            </div>
            <div class="row"> 
            </div>
        </div>

            <div class="col-md-6"> 
                <input id="btnAtualizarDados" name="btnAtualizarDados" type="button" class="btn btn-primary btn-sm" style="width:190px;height:40px;font-size:15px;background-color: #000;" onclick="AtualizarDados()" value="Atualizar Dados"> 
            </div>
    </div>
</form>




<!-- FORMULÁRIO DE VEÍCULO E DE INSTRUTOR--> 
    <style type="text/css">
.escondida1 {
    display:none;
}
</style>

<script type="text/javascript">
function abrir() {
    var main = document.getElementById("central");
    var iten = main.getElementsByTagName("input");
    if (iten) {
        for (var i=0;i<iten.length;i++) {
            iten[i].onclick = function() {
                var el = document.getElementById(this.id.substr(7,7));
                if (el.style.display == "block")
                    el.style.display = "none";
                else
                    el.style.display = "block";
            }
        }
    }
}
window.onload=abrir;
</script>

<div id="central">
    <!-- Botao -->
    <div >
    <input class="btn btn-primary btn-sm" style=" width:190px;height:40px;font-size:15px;background-color: #000; margin-left: 21.6%; margin-top: 1%;" type="button" value="Adicionar instrutor/veículo" id="receita1">
    </div>

    <!-- conteudo escondido -->
    <div style=" margin-bottom: 25%;" id="1" class="escondida1"> 
        <!-- Aqui fica o seu form -->
                    
                    <!-- INICIO DO FORMULÁRIO -->
                    
                    <form style="float: left; width: 200px; margin-left: 34%; margin-top: 2%;" id="formulario1" method="post" action="insere_instrutor.php">
                        <h3>Cadastre um instrutor</h3>
                        <p>
                            Nome:<br>
                            <input type="text" name="nomeIns" id="nome_id">
                        </p>
                        
                        <p>
                            CPF:<br>
                            <input type="text" name="cpfIns" id="email_id">
                        </p>
                        
                        <p>
                            Data de nascimento:<br>
                            <input type="date" name="datanascIns" id="fone_id">
                        </p>
                        
                        <p>
                            <input class="botao" type="submit" name="enviar" id="enviar_id" value="Enviar">
                        </p>
                        
                    </form>

                    <!-- INICIO DO FORMULÁRIO -->
                    
                    <form style="float: right; width: 200px; margin-top: 2%; margin-right: 35%;" id="formulario1" method="post" action="insere_veiculos.php">
                        <h3>Cadastre um veículo</h3>
                        <p>
                            Tipo do veículo:<br>
                            <input type="text" name="desc" id="nome_id">
                        </p>
                        
                        <p>
                            Marca:<br>
                            <input type="text" name="marca" id="email_id">
                        </p>
                        
                        <p>
                            Modelo:<br>
                            <input type="text" name="model" id="fone_id">
                        </p>
                        
                        <p>
                            Cor:<br>
                            <input type="text" name="cor" id="nome_id">
                        </p>

                        <p>
                            Placa:<br>
                            <input type="text" name="placa" id="nome_id">
                        </p>
                        
                        <p>
                            <input class="botao" type="submit" name="enviar" id="enviar_id" value="Enviar">
                        </p>
                        
                    </form>
                    
                   


    
    
    </div>
</div>

<!-- FORMULÁRIO DE VEÍCULO E DE INSTRUTOR--> 
<style type="text/css">
.escondida1 {
    display:none;
}
</style>
<br><br>

<form id="formDadosAluno" name="formDadosAluno" method="post" action="publication.php" enctype="multipart/form-data">
    <input type="hidden" id="hdnCodAuto" name="hdnCodAuto" value="Gerenciamento de publicação">
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="font-size:20px"><b>Gerenciamento da publicação</b></div>  
            <div class="row">
                <div class="col-md-12">
                    <label class="" style="font-weight:normal">Descrição da autoescola:</label><label class="font"  style="color: red">*</label>
                    <textarea placeholder="<?php echo"$DescricaoAuto"; ?>" style="max-height: 100px; min-height: 100px;" onkeypress="return letras()" class="form-control" name="descricao" id="txtNomeCadastro" value=""></textarea>          
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="" style="font-weight:normal">Fotos:</label><label class="font"  style="color: red">*</label>
                    <input type="file" onkeypress="return letras()" class="form-control" name="arquivo[]" id="txtNomeCadastro" multiple>         
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <?php 

                    ?>
                    <label class="" style="font-weight:normal">Valores:</label><label class="font"  style="color: red">*</label>
                    <ul>
                        <li>Categoria ACC:</li> <input type="text" class="form-control" name="ACC" id="ACC" value="" > 
                        <li>Categoria A:</li> <input type="text" class="form-control" name="A" id="A" value=""> 
                        <li>Categoria B:</li> <input type="text" class="form-control" name="B" id="B" data-toggle-form-edit="#B" value="">  
                        <li>Categoria C:</li> <input type="text" class="form-control" name="C" id="C" data-toggle-form-edit="#C" value=""> 
                        <li>Categoria D:</li> <input type="text" class="form-control" name="D" id="D" data-toggle-form-edit="#D" value="">  
                        <li>Categoria E:</li> <input type="text" class="form-control" name="E" id="E" data-toggle-form-edit="#E" value="">   
                    </ul>          
                </div>
                <div class="col-md-4">
                <label class="" style="font-weight:normal">Desabilitar os que não serão trabalhados:</label><label class="font"  style="color: red">*</label>
                    <div style="margin-top: 25px;">
                        <input style="margin-bottom: 25px;" type="checkbox" class="form-control" name="ACCI" id="txtNomeCadastro" onclick="desabilitarACC('simACC')">
                        <input style="margin-bottom: 25px;" type="checkbox" class="form-control" name="AI" id="txtNomeCadastro" onclick="desabilitarA('simA')">  
                        <input style="margin-bottom: 25px;" type="checkbox" class="form-control" name="BI" id="txtNomeCadastro" onclick="desabilitarB('simB')">  
                        <input style="margin-bottom: 25px;" type="checkbox" class="form-control" name="CI" id="txtNomeCadastro" onclick="desabilitarC('simC')">  
                        <input style="margin-bottom: 25px;" type="checkbox" class="form-control" name="DI" id="txtNomeCadastro" onclick="desabilitarD('simD')">  
                        <input style="margin-bottom: 25px;" type="checkbox" class="form-control" name="EI" id="txtNomeCadastro" onclick="desabilitarE('simE')">  
                    </div>
                </div>
            </div>
            <div class="row"> 
            </div>
        </div>
        
        <script>
        function desabilitarACC(valor) {
        var status = document.getElementById('ACC').disabled;
        if (valor == 'simACC' && !status) {
            document.getElementById('ACC').disabled = true;
        } else { 
            document.getElementById('ACC').disabled = false;
        }
        }
        function desabilitarA(valor) {
        var status = document.getElementById('A').disabled;
        if (valor == 'simA' && !status) {
            document.getElementById('A').disabled = true;
        } else { 
            document.getElementById('A').disabled = false;
        }
        }
        function desabilitarB(valor) {
        var status = document.getElementById('B').disabled;
        if (valor == 'simB' && !status) {
            document.getElementById('B').disabled = true;
        } else { 
            document.getElementById('B').disabled = false;
        }
        }
        function desabilitarC(valor) {
        var status = document.getElementById('C').disabled;
        if (valor == 'simC' && !status) {
            document.getElementById('C').disabled = true;
        } else { 
            document.getElementById('C').disabled = false;
        }
        }
        function desabilitarD(valor) {
        var status = document.getElementById('D').disabled;
        if (valor == 'simD' && !status) {
            document.getElementById('D').disabled = true;
        } else { 
            document.getElementById('D').disabled = false;
        }
        }
        function desabilitarE(valor) {
        var status = document.getElementById('E').disabled;
        if (valor == 'simE' && !status) {
            document.getElementById('E').disabled = true;
        } else { 
            document.getElementById('E').disabled = false;
        }
        }
        </script>

        

            <div class="col-md-6"> 
                <input id="btnAtualizarDados" name="btnAtualizarDados" type="submit" class="btn btn-primary btn-sm" style="width:190px;height:40px;font-size:15px;background-color: #000;" value="Atualizar/Inserir"> 
            </div>
    </div>
</form>





     <!---================Inicio Novos Campos Formulario =================---->
       
        <?php include("footer.html");?>  
        
        
        

        </script>
        
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
        $("#txtCnpj").mask("00.000.000/0000-00");
        $("#txtCep").mask("99999-999"); 
        $(".data").mask("99/99/9999");
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
    function InsereInstrutor(){
        alert("Enviado!!!");
    var Nome = document.getElementById('nomeIns').value;
    var Cpf = document.getElementById('cpfIns').value;
    var Datanasc = document.getElementById('datanascIns').value;
    
    $.ajax({
      type : "POST",
      url : "http://localhost/web-app/tcc/greatseo-testes-2/ajax/insere_instrutor.php", 
      data: { Nome: Nome, Cpf: Cpf, Datanasc: Datanasc, },
      success : function(response) {
        
          
    },
      error : function(response) {
        console.log("error..!! - ajax insere instrutor");
      }
    });
}
</script>

<script>
    function AtualizarDados(){
        alert("Teste");
    var CodAuto = document.getElementById('hdnCodAuto').value;
    var Nome = document.getElementById('txtNomeCadastro').value;
    var NomeUser = document.getElementById('txtNomeCadastroUser').value;
    var Email = document.getElementById('txtEmail').value;
    var cnpj = document.getElementById('txtCnpj').value;
    var Telefone = document.getElementById('txtTelefone').value;
    var TelefoneFix = document.getElementById('txtTelefone2').value;
    var Endereco = document.getElementById('txtLogradouroCadastro').value;
    var Cep = document.getElementById('txtCep').value;
    var Complemento = document.getElementById('txtComplemento').value;
    var Numero = document.getElementById('txtNumero').value;

    $.ajax({
      type : "POST",
      url : "http://localhost/web-app/tcc/greatseo-testes-2/ajax/update_ProfileAuto.php", 
      data: { Nome: Nome, Email: Email, cnpj: cnpj, Telefone: Telefone, Endereco: Endereco, Cep: Cep, Complemento: Complemento, CodAuto: CodAuto, NomeUser:NomeUser, TelefoneFix:TelefoneFix,Numero:Numero },
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

   
   
