<?php
session_start();

 include("Login_v13/init.php");
 include("Login_v13/check.php");


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
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Auto Help</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
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

    <link rel="stylesheet" href="styleAplicacao.css">
	
	<script src="js/modernizr.custom.79639.js"></script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="seo_version">

	<!-- LOADER -->
	<div id="preloader">
		<div class="loader-wrapper">
			<div class="loader-new">
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
			</div>
			<div class="text">CARREGANDO...</div>
		</div>
	</div>
	<!-- END LOADER -->
	
	<!-- Start header -->
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
						<li class="nav-item active"><a class="nav-link" href="aplicacao.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="agenda.php">Agenda</a></li>
						<li class="nav-item"><a class="nav-link" href="financas.php">Finanças</a></li>
						<!---<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Alunos </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="services.html">Informações sobre os Alunos</a>
								<a class="dropdown-item" href="services.html"></a>
								<a class="dropdown-item" href="services.html"></a>
								<a class="dropdown-item" href="services.html"></a>
								<a class="dropdown-item" href="services.html"></a>
								<a class="dropdown-item" href="services.html"></a>
							</div>
						</li>--->
						<li class="nav-item"><a class="nav-link" href="alunos.php">Alunos</a></li>
                        <li class="nav-item"><a class="nav-link" href="AbaAjuda.php">Ajuda</a></li>
                        
					</ul>
				</div>
				<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">
							<i class="fa fa-user" aria-hidden="true"></i><?php echo "&nbsp $username"; ?></a>
						<div class="dropdown-menu" aria-labelledby="dropdown-a">
							<a class="dropdown-item" href="profile.php">Perfil</a>
							<a class="dropdown-item" href="services.html">Configurações</a>
							<a class="dropdown-item" href="index.html">Sair</a>
						</div>
				</li>
			</div>
		</nav>
	</header>
	<!-- End header -->



    	<!-- /sl-slider -->
     <div id="slider" class="sl-slider-wrapper">

		<div class="sl-slider">
		
			<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
				<div class="sl-slide-inner">
					<div class="img-5"></div>
					<img style=" width: 100%; height: 100%;" id="bem_vindo" src="images/BEM.png">
					</blockquote>
				</div>
			</div>
			
		</div><!-- /sl-slider -->
			
		</nav>

	</div><!-- /slider-wrapper -->


	<!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
	<div id="about" class="section wb nopadtop">
        <div class="container">
            			
			<div class="section-title text-center">               
                <h3>Segue as principais notícias da semana!</h3>
            </div><!-- end title -->
			
			<div class="seo-services row clearfix">
                <div style="margin-top: 60px;"class="col-md-6 col-xs-12">
					<div class="why-img-box">
						<img src="images/not-1.jpg" class="img-fluid" alt="" />
					</div>
                </div><!-- end col -->

                <div class="col-md-6 col-xs-12">
					<div class="why-dit">
						<h4>Aulas suspensas</h4>
						<p>Se você você pensou que a quarentena seria um bom momento para dar início ao processo de habilitação, saiba que isso não será possível. Diversos Departamentos Estaduais de Trânsito (Detrans) ficaram fechados ou suspenderam suas atividades presenciais. O Detran do RJ, por exemplo, fechou praticamente todos as suas unidades no dia 17 de março e fez um reagendamento dos exames de motorista para os 30 dias seguintes. Desde então, não aceitou mais abertura de processos para tirar carteira. Uma semana depois, o Detran de SP também suspendeu suas atividades presenciais, assim como as autoescolas. Mas como esse processo se adaptou ao momento excepcional da pandemia?</p><a href="https://revistaautoesporte.globo.com/Noticias/noticia/2020/08/consigo-tirar-cnh-durante-pandemia-saiba-como-autoescolas-estao-funcionando-na-quarentena.html">Leia mais...</a>
					</div>
                </div><!-- end col -->
				
				<div class="col-md-6 col-xs-12">
					<div class="why-dit">
						<h4>Tempo para realização do processo foi estentido para 18 messes</h4>
						<p>Apesar do sindicato ter declarado que as aulas presenciais foram retomadas em junho, Luiza Colmanetti, 21, comentou que a autoescola onde está matriculada não voltou a funcionar. "Eu fico preocupada, só faltava a prova prática para terminar. Agora vou ter que fazer mais algumas aulas presenciais para relembrar, acabou com o meu ritmo", afirma. Como a estudante deu entrada em junho de 2019, ela teria o prazo de um ano para finalizar todas as etapas e sair com a carteira na mão. No entanto, o Conselho Nacional de Trânsito (Contran) determinou que esse período tivesse uma extensão de 12 para 18 meses, para que os alunos não sejam prejudicados.</p><a href="https://revistaautoesporte.globo.com/Noticias/noticia/2020/08/consigo-tirar-cnh-durante-pandemia-saiba-como-autoescolas-estao-funcionando-na-quarentena.html">Leia mais...</a>
					</div>
                </div><!-- end col -->
				


                <div style="margin-top: 60px;" class="col-md-6 col-xs-12">
					<div class="why-img-box">
						<img src="images/not-2.jpg" class="img-fluid" alt="" />
					</div>
                </div><!-- end col -->
            </div><!-- end how-its-work -->

            <div class="seo-services row clearfix">
                <div style="margin-top: 60px;" class="col-md-6 col-xs-12">
					<div class="why-img-box">
						<img src="images/not-3.jpg" class="img-fluid" alt="" />
					</div>
                </div><!-- end col -->

                <div class="col-md-6 col-xs-12">
					<div class="why-dit">
						<h4>O custo para tirar a carteira permanece o mesmo?</h4>
						<p>No Rio de Janeiro, o retorno das aulas foi permitido com redução da capacidade, distanciamento de 1,5 m entre os alunos e limitação de três horas por aula. O retorno das aulas práticas também foi permitido, com o veículo passando por higienização a cada início e fim de aula. Entretanto, as provas práticas e teóricas estão suspensas até "a melhora das condições sanitárias", como afirmam as autoridades.</p><a href="https://revistaautoesporte.globo.com/Noticias/noticia/2020/08/consigo-tirar-cnh-durante-pandemia-saiba-como-autoescolas-estao-funcionando-na-quarentena.html">Leia mais...</a>
					</div>
                </div><!-- end col -->
				
				<div class="col-md-6 col-xs-12">
					<div class="why-dit">
						<h4>Sindicato solicita o aumento do número de vagas para os exames práticos em todo o estado SP</h4>
						<p>O Sindautoescola.SP protocolou nesta quinta-feira (20) novo Ofício no Detran.SP, dessa vez para solicitar o aumento do número de vagas para as Autoescolas/CFCs agendarem os exames práticos em todo o estado de SP. Clique aqui e leia o Ofício DH Nº 010/20. O pedido é feito com base no bom andamento dos exames práticos que retomaram nas últimas semanas e nas atualizações do Plano SP, que colocou diversas cidades do estado na fase amarela..</p><a href="https://www.sp.sindautoescola.org.br/noticias/item/exames-praticos/4119">Leia mais...</a>
					</div>
                </div><!-- end col -->
				
                
				
                <div style="margin-top: 60px;" class="col-md-6 col-xs-12">
					<div class="why-img-box">
						<img src="images/not-4.jpg" class="img-fluid" alt="" />
					</div>
                </div><!-- end col -->
            </div><!-- end how-its-work -->
            
        </div><!-- end container -->
    </div><!-- end section -->
	<!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->

    <div id="support" class="section db">
        <div class="container">
            <div class="row">
                <div id="logo-carousel" class="owl-carousel">
					<div> <img src="images/logo_01.png" alt=""> </div>
					<div> <img src="images/logo_02.png" alt=""> </div>
					<div> <img src="images/logo_03.png" alt=""> </div>
					<div> <img src="images/logo_04.png" alt=""> </div>
					<div> <img src="images/logo_05.png" alt=""> </div>
					<div> <img src="images/logo_06.png" alt=""> </div>
					<div> <img src="images/logo_01.png" alt=""> </div>
					<div> <img src="images/logo_02.png" alt=""> </div>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
	
	<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <img src="images/logo-light.png" alt="">
                        </div>
                        <p> SEO Mauris pharetra quam ut commodo malesuada. Sed a ornare purus, nec cursus tortor. Integer vehicula felis nec nunc pulvinar efficitur. In et semper odio. Sed laoreet ullamcorper augue, ut mattis metus mattis quis.</p>
                        <p>Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
				<div class="col-lg-2 col-md-6 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Information</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Pricing</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Faq</a></li>
							<li><a href="#">Contact</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="widget clearfix">
						<div class="widget-title">
							<h3>Newsletter</h3>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et tincidunt risus, vitae sollicitudin tellus.</p>
						<div class="news-box">
							<form action="#" method="post">
								<div class="form-group">
									<input class="form-control" placeholder="Email address" type="email">
									<button type="submit">
										<svg id="Layer_11" data-name="Layer 11" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.19 17.71">
											<path class="cls-1" d="M311,387.93a.89.89,0,0,0-1.27,1.26l6.44,6.44H295a.89.89,0,0,0-.89.89.9.9,0,0,0,.89.9h21.24l-6.44,6.42a.91.91,0,0,0,0,1.27.89.89,0,0,0,1.27,0l8-8a.87.87,0,0,0,0-1.25Z" transform="translate(-294.08 -387.67)"></path> </svg>
									</button>
								</div>
							</form>
						</div>
						
                        <div class="widget-title">
                            <h3>Social</h3>
                        </div>
                        <ul class="footer-links social-md">
                            <li><a class="fb btn-a" title="Facebook" data-tippy-animation="scale" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="gi btn-a" title="Github" data-tippy-animation="scale" href="#"><i class="fa fa-github"></i> </a></li>
                            <li><a class="tw btn-a" title="Twitter" data-tippy-animation="scale" href="#"><i class="fa fa-twitter"></i> </a></li>
                            <li><a class="dr btn-a" title="Dribbble" data-tippy-animation="scale" href="#"><i class="fa fa-dribbble"></i> </a></li>
                            <li><a class="pi btn-a" title="Pinterest" data-tippy-animation="scale" href="#"><i class="fa fa-pinterest"></i> </a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
				<div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:#">info@yoursite.com</a></li>
                            <li><a href="#">www.yoursite.com</a></li>
                            <li>PO Box 16122 Collins Street West Victoria 8007 Australia</li>
                            <li>+61 3 8376 6284</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->
	
    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">
                    <p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="#">GreatSEO</a> Design By : <a href="https://html.design/">html design</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/tippy.all.min.js"></script>
    <script src="js/custom.js"></script>
	
	<script src="js/jquery.ba-cond.min.js"></script>
	<script src="js/jquery.slitslider.js"></script>
	<script type="text/javascript">	
			$(function() {
			
				var Page = (function() {

					var $nav = $( '#nav-dots > span' ),
						slitslider = $( '#slider' ).slitslider( {
							onBeforeChange : function( slide, pos ) {

								$nav.removeClass( 'nav-dot-current' );
								$nav.eq( pos ).addClass( 'nav-dot-current' );

							}
						} ),

						init = function() {

							initEvents();
							
						},
						initEvents = function() {

							$nav.each( function( i ) {
							
								$( this ).on( 'click', function( event ) {
									
									var $dot = $( this );
									
									if( !slitslider.isActive() ) {

										$nav.removeClass( 'nav-dot-current' );
										$dot.addClass( 'nav-dot-current' );
									
									}
									
									slitslider.jump( i + 1 );
									return false;
								
								} );
								
							} );

						};

						return { init : init };

				})();

				Page.init();
			
			});
		</script>
		
		<script>
			tippy('.btn-a')
		</script>


</body>
</html>