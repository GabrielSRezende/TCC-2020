<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Auto-Help</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

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
    
    <script src="js/modernizr.custom.79639.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="seo_version">

    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img style="width: 250px;" src="images/logo.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-seo" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

            
            <div class="collapse navbar-collapse" id="navbars-seo">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a style="color:#fafafa" class="nav-link" href="aplicacao.php">Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>



    <form id="formDadosAluno" name="formDadosAluno" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="panel panel-primary">
              <div class="panel-heading" style="font-size:25px"><b>Coloque seus Dados para o envio do Token:</b></div> 
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6">
                         <label class="" style="font-weight:normal">Nome Completo:</label><label class="font"  style="color: red">*</label>
                         <input type="text" class="form-control" id="TxtNome" name="TxtNome" value="" style="height:60%;width: 100%;font-size:15px">
                    </div>
                </div>
                <br>    
                <div class="row"> 
                    <div class="col-md-6">
                         <label class="" style="font-weight:normal">Digite seu E-mail:</label><label class="font"  style="color: red">*</label>
                         <input type="text" class="form-control" id="TxtEmail" name="TxtEmail" value="" style="height:60%;width: 100%;font-size:15px">
                    </div>
                </div> 
                <br>
                <br>
                <div class="row"> 
                	<div class="col-md-3">
                        <input type="hidden" value="0" id="hdnEmail" name="hdnEmail">   
                            <button type="button" class="btn btn-warning form-control" onclick="EnviaEmail()" style="margin-top:-10%">Enviar</button>
                    </div>
                </div>         
            </div>
        </div>
    </form>
</body>


</html>


<script>
    function EnviaEmail(){
        alert("Teste");
    var Nome = document.getElementById('TxtNome').value;
    var Email = document.getElementById('TxtEmail').value;

    $.ajax({
      type : "POST",
      url : "http://localhost/web-app/tcc/greatseo-testes-2/EmailToken.php", 
      data: { Nome: Nome, Email: Email, },

      success : function(response) {
          
    },
      error : function(response) {
        console.log("error..!! - ajax insere aulas");

      }
    });

}
</script>