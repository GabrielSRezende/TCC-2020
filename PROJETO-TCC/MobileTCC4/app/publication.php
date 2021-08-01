<?php 
            session_start();
            include("../login/init.php");
            include("../login/check.php");
            include("../conexao.php"); 
            $username = $_SESSION['user_name'];
            $id = $_SESSION['cod_cli'];


?>

    <?php 
       $Hdn = (!empty($_GET['HdnBusca']) ? $_GET['HdnBusca'] : ''); 

       if($Hdn == 1){

        $input = (!empty($_GET['txtnomeauto']) ? $_GET['txtnomeauto'] : ''); 

        $sql = "SELECT * FROM autoescolas where Nome_Auto = '$input'";

    }  else {

         $sql = "SELECT * FROM autoescolas";
    }
        $result = $conn->query($sql); 
        while($row = $result->fetch_assoc())

            {
                $Cod = $row['Cod_Auto'];
                $Nome = $row['Nome_Auto'];
                $Descr = $row['Descricao'];
                 $Endereco = $row['Endereco'];

       
                $sql2 = "SELECT * FROM valores WHERE Cod_Auto = $Cod AND Status = 'A'";
                $result2 = $conn->query($sql2);
                while($row = $result2->fetch_assoc()){
                    $CodCateg = $row['Cod_Categ'];
                    $Valor = $row['Valor'];
                } 
                $sql3 = "SELECT * FROM fotos WHERE Cod_Auto = $Cod";
                $result3 = $conn->query($sql3);
                while($row = $result3->fetch_assoc()){
                    $Foto = $row['Foto'];
                    
                } 
                
            } 
          ?>


<!doctype html>
  
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>App Landing Template </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/flaticon.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style.css">
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
   </head>

   <body>

    <!-- Preloader Start -->
   
 
    <!---<?php var_dump ($Foto); ?>--->
<form style="width: 96%;" id="formDadosAluno" name="formDadosAluno" method="post" enctype="multipart/form-data" action="pagamento.php">
    <div class="row" style="">
        <div class="col-sm-3">
            <label class="" style="font-weight:normal; margin-left: 10px; margin-top: 20px;">Digite o nome da Auto-Escola desejada:</label><label class="font"  style="color: red">*</label>
            <input style="width:95%; margin-left: 10px; " type="text" class="form-control" id="txtnomeauto" name="txtnomeauto" value="" >
            <input type="hidden" class="" id="HdnBusca" name="HdnBusca" value="">
        </div>
    </div>
    <br>
     <div class="row" align="right" style="margin-right:20px;">
        <div class="col-sm-3">
            <input style="width: 104%; margin-left: 10px;" type="button" id="btnBusca" name="btnBusca" value="Buscar" onclick="Buscar()">
        </div>
    </div>
    <br>
    <br>
    <div class="container" id="EscondeTeste">
        <div class="panel panel-primary">
          <div class="panel-heading" style="font-size:14px"><b>Bem vindo!!!!</b> <?php echo"$username"?></div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6">
                     <label class="" style="font-weight:normal">Auto-Escola:</label><label class="font"  style="color: red">*</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                     <label class="" style="font-weight:normal">Endereço:</label><label class="font"  style="color: red">*</label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                     <label class="" style="font-weight:normal">Foto:</label><label class="font"  style="color: red">*</label>
                </div>
            </div>
            <br>
        </div>
    </div>
    <br>
    <br>
    <div class="container" id="ApareceTeste" style="display: none">
        <div class="panel panel-primary">
          <div class="panel-heading" style="font-size:14px"><b>Bem vindo!!!!</b> <?php echo"$username"?></div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6">
                     <label class="" style="font-weight:normal">Auto-Escola:</label><label class="font"  style="color: red">*</label>
                     <label class="" style="font-weight:normal"><?php echo"$Nome"?></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                     <label class="" style="font-weight:normal">Endereço:</label><label class="font"  style="color: red">*</label>
                     <label class="" style="font-weight:normal"><?php echo"$Endereco"?></label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                     <label class="" style="font-weight:normal">Foto:</label><label class="font"  style="color: red">*</label>
                     <?php echo '<img style="width:100px;" src="' . $Foto . '" /></td>'; ?>
                    <label class="" onclick="window.open('http://localhost/MobileTCC4/app/<?php echo $Foto ?>');"><b><u>Visualizar</u></b></label>
                </div>
            </div>
            <br>
        </div>
    </div>
</form>

   <footer>

       <!-- Footer Start-->
      <div class="footer-main">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row  justify-content-between">
                    <div class="col-lg-3 col-md-4 col-sm-8">
                         <div class="single-footer-caption mb-30">
                              <!-- logo -->
                             <div class="footer-logo">
                                 <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                             </div>
                             <div class="footer-tittle">
                                 <div class="footer-pera">
                                     <p class="info1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore.</p>
                                </div>
                             </div>
                         </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Links</h4>
                                <ul>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Features</a></li>
                                    <li><a href="#">Pricing</a></li>
                                    <li><a href="#">Download</a></li>
                                    <li><a href="#">Reviews</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Support</h4>
                                <ul>
                                    <li><a href="#">Report a bug</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Sitemap</a></li>
                                    <li><a href="#">FAQs</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Newsletter</h4>
                                <div class="footer-pera footer-pera2">
                                 <p>Heaven fruitful doesn't over lesser in days. Appear </p>
                             </div>
                             <!-- Form -->
                             <div class="footer-form">
                                 <div id="mc_embed_signup">
                                     <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part" novalidate="true">
                                         <input type="email" name="EMAIL" id="newsletter-form-email" placeholder=" Email Address " class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '">
                                         <div class="form-icon">
                                             <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm"><img src="assets/img/shape/form_icon.png" alt=""></button>
                                         </div>
                                         <div class="mt-10 info"></div>
                                     </form>
                                 </div>
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Copy-Right -->
                <div class="row align-items-center">
                    <div class="col-xl-12 ">
                        <div class="footer-copy-right">
                           <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
       <!-- Footer End-->

   </footer>
   
	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        <!-- Date Picker -->
        <script src="./assets/js/gijgo.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>
        
    </body>
</html>

<script>
function Buscar(){
alert("Teste");
document.getElementById('HdnBusca').value=1;
document.getElementById('formDadosAluno').submit();

}

</script>

<script>
function Buscar(){
alert("Teste");
document.getElementById('EscondeTeste').style.display='none';
document.getElementById('ApareceTeste').style.display='block';


}

</script>