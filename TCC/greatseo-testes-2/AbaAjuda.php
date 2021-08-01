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
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!-- Responsive CSS -->
  
    <!-- Bootstrap JS --> 
  
<!--===============================================================================================-->
   
<!--===============================================================================================-->
    

    <!--- fim teste--->

       
<!--===============================================================================================-->

        
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
       	
                    
        
        <!--================Inicio Novos Campos Formulario =================-->
<form id="formDadosAluno" name="formDadosAluno" method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="panel panel-primary">
          <div class="panel-heading" style="font-size:20px"><b>Suporte:</b> <?php echo"$username"?></div> 
            <div class="row">
                <div class="col-md-12">
                     <label class="" style="font-weight:normal">Digite Corpo do E-mail:</label><label class="font"  style="color: red">*</label>
                     <input type="text" class="form-control" id="txtComunicacao" name="txtComunicacao" value="" style="height:60%;width: 100%;font-size:15px">
                </div>
            </div>
            <div class="row"> 
            	<div class="col-md-3">
                    <input type="hidden" value="0" id="hdnEmail" name="hdnEmail">   
                        <button type="button" class="btn btn-warning form-control" onclick="EnviaEmail()" style="margin-top:-10%">E-mail</button>
                </div>
            </div>         
        </div>
    </div>
</form>

     <!---================Inicio Novos Campos Formulario =================---->
       
        <?php include("footer.html");?>  
        
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        
    </body>
    
</html>

<script>
    function EnviaEmail(){
        alert("Teste");
    var CorpoEmail = document.getElementById('txtComunicacao').value;
    alert(CorpoEmail);
    $.ajax({
      type : "POST",
      url : "http://localhost/web-app/tcc/greatseo-testes-2/EmailSuporte.php", 
      data: {CorpoEmail: CorpoEmail,  },

      success : function(response) {
       
          
    },
      error : function(response) {
        console.log("error..!! - ajax insere aulas");

      }
    });
}
</script>


   
   
