
<?php

session_start();

 include("Login_v13/init.php");
 include("Login_v13/check.php");
 include("conexao.php");

$id = $_SESSION['user_id'];

$sql = "SELECT * FROM cliente WHERE Cod_Auto = $id";
$con = $conn->query($sql) or die($conn->error);

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
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title></title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

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
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script> 
    <script src="js/modernizr.custom.79639.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="seo_version">
<div id="aluno">
        <!-- LOADER -->
        <div id="preloader">
            <div class="loader-wrapper">
                <div class="loader-new">
                    <div class="ball"></div>
                    <div class="ball"></div>
                    <div class="ball"></div>
                </div>
                <div class="text">LOADING...</div>
            </div>
        </div>
        <!-- END LOADER -->
    <?php include("Topmenu2.html");?>
   
            
    <br>

    <style>
        .row{
            margin-top:40px;
            padding: 0 10px;
        }
        .clickable{
            cursor: pointer;   
        }

        .panel-heading div {
            margin-top: -18px;
            font-size: 15px;
        }
        .panel-heading div span{
            margin-left:5px;
        }
        .panel-body{
            display: none;
        }
        .panel-primary {
            border-color: #000;
        }
        .panel-primary>.panel-heading {
            color: #fff;
            background-color: #000;
            border-color: #000;
        }
       
        body{
          font-family: Verdana, Geneva, sans-serif;
        }
        }
    </style>
                    <form id="FormAlunos"method="post" action="alunosPerfil.php">
                        <input type="hidden" id="hdnCodAluno" name="hdnCodAluno" value="0">
                        <div style="text-align: center;" >
                            <!--<span  style="margin-right: 50px;" class="label-input100"><h2>Nome do Aluno</h2></span>-->              
                            <!--<input style="width: 1050px;" class="label-aluno" type="text" name="nomeAluno" placeholder="Digite o nome do aluno...">
                            <input style="width: 300px;" type="submit" value="Enviar" placeholder="">-->
                        </div>   
                        
<br>
<br>
<br>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading" style="font-size:17px"><b>Alunos:</b></div>
                                            
                                            <div class="panel-body">
                                                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filtro de alunos"/>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr style="font-size:13px">
                                                            <th width="10%"></th>
                                                            <th>Nome</th>
                                                            <th>Email</th>
                                                            <th>CPF</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size:13px">
                                                        <?php while($dado = $con->fetch_array()) { ?>
                                                            <tr onclick="exe_submit(this)">
                                                                <td id="cod_aluno"><?php echo $dado['Cod_Cli']; ?></td>
                                                                <td><?php echo $dado['Nome_Cli']; ?></td>
                                                                <td><?php echo $dado['Email']; ?></td>
                                                                <td><?php echo $dado['CPF']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            </div>
                        </div> 
                    </form>


        <br>
        <br>
        <br>
        <br>
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
        <?php include("footer.html");?>
        
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

<script type="text/javascript">
    function exe_submit(){
        var id_aluno = document.getElementById("cod_aluno").textContent;
        id_aluno = parseInt(id_aluno); 
        document.getElementById("hdnCodAluno").value = id_aluno;
        alert(id_aluno);
        document.getElementById('FormAlunos').submit();
    }
</script>

<script type="text/javascript">
    /**
*   I don't recommend using this plugin on large tables, I just wrote it to make the demo useable. It will work fine for smaller tables 
*   but will likely encounter performance issues on larger tables.
*
*       <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
*       $(input-element).filterTable()
*       
*   The important attributes are 'data-action="filter"' and 'data-filters="#table-selector"'
*/
(function(){
    'use strict';
    var $ = jQuery;
    $.fn.extend({
        filterTable: function(){
            return this.each(function(){
                $(this).on('keyup', function(e){
                    $('.filterTable_no_results').remove();
                    var $this = $(this), 
                        search = $this.val().toLowerCase(), 
                        target = $this.attr('data-filters'), 
                        $target = $(target), 
                        $rows = $target.find('tbody tr');
                        
                    if(search == '') {
                        $rows.show(); 
                    } else {
                        $rows.each(function(){
                            var $this = $(this);
                            $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
                        })
                        if($target.find('tbody tr:visible').size() === 0) {
                            var col_count = $target.find('tr').first().find('td').size();
                            var no_results = $('<tr class="filterTable_no_results"><td></td><td></td><td style="text-align:center" colspan="'+col_count+'">Nenhum resultado encontrado</td></tr>')
                            $target.find('tbody').append(no_results);

                        }
                    }
                });
            });
        }
    });
    $('[data-action="filter"]').filterTable();
})(jQuery);

$(function(){
    // attach table filter plugin to inputs
    $('[data-action="filter"]').filterTable();
    
    $('.container').on('click', '.panel-heading span.filter', function(e){
        var $this = $(this), 
            $panel = $this.parents('.panel');
        
        $panel.find('.panel-body').slideToggle();
        if($this.css('display') != 'none') {
            $panel.find('.panel-body input').focus();
        }
    });
    $('[data-toggle="tooltip"]').tooltip();
})
</script>