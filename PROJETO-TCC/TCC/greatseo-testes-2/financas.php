
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
<html lang="pt-br">
<head>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    

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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
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
                <div class="text">CARREGANDO...</div>
            </div>
        </div>
        <!-- END LOADER -->
        
         <!-- Start header -->
    <?php include("Topmenu2.html");?>
        
    <div style = "width: 100%"> 
     
    </div>  

    <br>
            <!-- PRIMEIRO QUADRO PARA TABELA -->
    <style>
        .row{
            margin-top:40px;
            padding: 0px;
        }
        .clickable{
            cursor: pointer;   
        }

        .panel-heading div {
            margin-top: -18px;
            font-size: 15px;
        }
        .panel-heading div span{
            margin-left:;
        }
        .panel-body{
            display: none;
        }
        .panel-primary {
            border-color: #3573dc;
        }
        .panel-primary>.panel-heading {
            color: #fff;
            background-color: #3573dc;
            border-color: #3573dc;
        }
    </style>
                    <form id="FormAlunos"method="post" action="alunosPerfil.php">
                        <input type="hidden" id="hdnCodAluno" name="hdnCodAluno" value="0">
                        <div style="text-align: center;" >
                            <!--<span  style="margin-right: 50px;" class="label-input100"><h2>Nome do Aluno</h2></span>-->              
                            <!--<input style="width: 1050px;" class="label-aluno" type="text" name="nomeAluno" placeholder="Digite o nome do aluno...">
                            <input style="width: 300px;" type="submit" value="Enviar" placeholder="">-->
                        </div>   
                        
                        <div style="text-align: center; width: 36%; margin-left: 37px; float: left;" class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Entradas</h3>
                                            <div class="pull-right">
                                                <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                    <i class="glyphicon glyphicon-filter"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <input type="date" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filtro de alunos"/>
                                        </div>
                                        <table class="table table-hover" id="dev-table">
                                            <thead>
                                                <?php 
                                                    $mes = 0;
                                                    $cont = 0;
                                                    $var=0;
                                                    $arr = array();
                                                     $ContJulho=0;$ContAgosto=0;$ContSetembro=0;$ContOutubro=0;$ContNovembro=0;$ContDezembro=0;
                                                    $CatA=0;$CatB=0;$CatC=0;$CatD=0;$CatE=0;$CatAcc=0;
                                                    $Abril = 0;$Maio = 0;$Junho = 0;$Julho = 0;$Agosto = 0;$Setembro = 0;$Outubro = 0;$Novembro = 0;$Dezembro = 0;
                                                    $varAbril = 0;$varMaio = 0;$varJunho = 0;$varJulho = 0;$varAgosto = 0;$varSetembro = 0;$varOutubro = 0;
                                                    $varNovembro = 0;$varDezembro = 0;

                                                    while($row = $result->fetch_assoc())
                                                    {

                                                     $Cod = $row['Cod_Din'];
                                                     $arr[$cont] = strftime("%B", strtotime($row['Data']));
                                                     $sql2 = "UPDATE dinheiro SET Mes = '$arr[$cont]' WHERE Cod_Din = $Cod";
                                                     $result2 = $conn->query($sql2);                                              
                                                     $nome = $row['Nome_Cli'];
                                                     $entrada = $row['Entrada'];
                                                     $total = $entrada + $var;
                                                     $var = $total;
                                                     $Cat = $row['Descr_Categ'];
                                                     switch ($Cat) {
                                                         case 'A':
                                                             $CatA++;
                                                             break;
                                                         case 'B':
                                                             $CatB++;
                                                             break;
                                                         case 'C':
                                                             $CatC++;
                                                             break;
                                                         case 'D':
                                                             $CatD++;
                                                             break;
                                                         case 'E':
                                                             $CatE++;
                                                             break;
                                                         case 'ACC':
                                                             $CatAcc++;
                                                             break;   
                                                     }

                                                      switch ($arr[$cont]) {
                                                         case 'julho':
                                                             $ContJulho++;
                                                             break;
                                                         case 'agosto':
                                                             $ContAgosto++;
                                                             break;
                                                         case 'setembro':
                                                             $ContSetembro++;
                                                             break;
                                                         case 'outubro':
                                                             $ContOutubro++;
                                                             break;
                                                         case 'novembro':
                                                             $ContNovembro++;
                                                             break;
                                                         case 'dezembro':
                                                             $ContDezembro++;
                                                             break;   
                                                     }

                                                     $cont++;
                                                    }
                                                
                                                ?>
                                                <tr><th>&nbsp&nbsp&nbsp&nbspTotal:&nbsp&nbspR$<?php echo "$var"; ?></th></tr>
                                                <tr>
                                                    <th width="10%"></th>
                                                    <th>Aluno</th>
                                                    <th>Entrada</th>
                                                    <th>Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 0;
                                                
                                                while($dado = $con->fetch_array()) { ?>
                                                    <tr onclick="exe_submit(this)">
                                                        <td width="10%"></td>
                                                        <td id="" ><?php echo $dado['Nome_Cli']; ?></td>
                                                        <td><?php echo "R$".$dado['Entrada']; ?></td>
                                                        <td><?php echo utf8_encode(strftime("%d de %B de %Y (%A)", strtotime($dado['Data'])));?></td>
                                                    </tr>
                                                    <?php 
                                                    } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </form>

                <!--SEGUNDO QUADRO PARA GRÁFICOS -->
    <style>
        .row{
            margin-top:40px;
            padding: 0px;
        }
        .clickable{
            cursor: pointer;   
        }

        .panel-heading div {
            margin-top: -18px;
            font-size: 15px;
        }
        .panel-heading div span{
            margin-left:0px;
        }
        .panel-body2{
            
        }
        .panel-primary {
            border-color: #3573dc;
        }
        .panel-primary>.panel-heading {
            color: #fff;
            background-color: #3573dc;
            border-color: #3573dc;
        }
    </style>

                        <div style="text-align: center; width: 60%; margin-left: 15px; float: left;" class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Dashboard</h3>
                                            <div class="pull-right">
                                                <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                    <i class="glyphicon glyphicon-filter"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="panel-body2">
                                                <div style="margin: 0px;">
                                                    
                                                <?php   
                                                $varAbrilTotal = 0;$varMaioTotal = 0;$varJunhoTotal = 0;$varJulhoTotal = 0;$varAgostoTotal=0;
                                                $varSetembroTotal=0;$varOutubroTotal=0;$varNovembroTotal=0;$varDezembroTotal=0;
                                                    for ($c=0; $c < $cont ; $c++) { 

                                                        switch ($arr[$c]) {
                                                            case "abril":
                                                                
                                                                $sqlAbril = "SELECT Entrada FROM dinheiro WHERE Mes like 'abril'";
                                                                $resultAbril = $conn->query($sqlAbril);
                                                                $cont2 = 0;
                                                                while($rowAbril = $resultAbril->fetch_assoc())
                                                                    {
                                                                        $cont2++;

                                                                        $entradaAbril = $rowAbril['Entrada'];
                                                                        
                                                                        $totalAbril = $entradaAbril + $varAbrilTotal;

                                                                        $varAbrilTotal = $totalAbril;

                                                                        $varAbril = $varAbrilTotal/$cont2;


                                                                    } 
                                                            break;

                                                            case "maio":
                                                                
                                                                $sqlMaio = "SELECT Entrada FROM dinheiro WHERE Mes like 'maio'";
                                                                $resultMaio = $conn->query($sqlMaio);
                                                                $cont2 = 0;
                                                                while($rowMaio = $resultMaio->fetch_assoc())
                                                                    {
                                                                        $cont2++;

                                                                        $entradaMaio = $rowMaio['Entrada'];
                                                                        
                                                                        $totalMaio = $entradaMaio + $varMaioTotal;

                                                                        $varMaioTotal = $totalMaio;

                                                                        $varMaio = $varMaioTotal/$cont2;
                                                                    } 
                                                            break;

                                                            case "junho":
                                                                
                                                                $sqlJunho = "SELECT Entrada FROM dinheiro WHERE Mes like 'junho'";
                                                                $resultJunho = $conn->query($sqlJunho);
                                                                $cont2 = 0;
                                                                while($rowJunho = $resultJunho->fetch_assoc())
                                                                    {
                                                                        $cont2++;

                                                                        $entradaJunho = $rowJunho['Entrada'];
                                                                        
                                                                        $totalJunho = $entradaJunho + $varJunhoTotal;

                                                                        $varJunhoTotal = $totalJunho;

                                                                        $varJunho = $varJunhoTotal/$cont2;
                                                                    } 
                                                            break;

                                                            case "julho":
                                                                
                                                                $sqlJulho = "SELECT Entrada FROM dinheiro WHERE Mes like 'julho'";
                                                                $resultJulho = $conn->query($sqlJulho);
                                                                $cont2 = 0;
                                                                while($rowJulho = $resultJulho->fetch_assoc())
                                                                    {
                                                                        $cont2++;

                                                                        $entradaJulho = $rowJulho['Entrada'];
                                                                        
                                                                        $totalJulho = $entradaJulho + $varJulhoTotal;

                                                                        $varJulhoTotal = $totalJulho;

                                                                        $varJulho = $varJulhoTotal/$cont2;

                                                                    } 
                                                            break;
                                                            
                                                            case "agosto":
                                                                
                                                                $sqlAgosto = "SELECT Entrada FROM dinheiro WHERE Mes like 'agosto'";
                                                                $resultAgosto = $conn->query($sqlAgosto);
                                                                $cont2 = 0;
                                                                while($rowAgosto = $resultAgosto->fetch_assoc())
                                                                    {
                                                                        $cont2++;

                                                                        $entradaAgosto = $rowAgosto['Entrada'];
                                                                        
                                                                        $totalAgosto = $entradaAgosto + $varAgostoTotal;

                                                                        $varAgostoTotal = $totalAgosto;

                                                                        $varAgosto = $varAgostoTotal/$cont2;

                                                                    } 
                                                            break; 

                                                            case "setembro":
                                                                
                                                                $sqlSetembro = "SELECT Entrada FROM dinheiro WHERE Mes like 'setembro'";
                                                                $resultSetembro = $conn->query($sqlSetembro);
                                                                $cont2 = 0;
                                                                while($rowSetembro = $resultSetembro->fetch_assoc())
                                                                    {
                                                                        $cont2++;

                                                                        $entradaSetembro = $rowSetembro['Entrada'];
                                                                        
                                                                        $totalSetembro = $entradaSetembro + $varSetembroTotal;

                                                                        $varSetembroTotal = $totalSetembro;

                                                                        $varSetembro = $varSetembroTotal/$cont2;

                                                                    } 
                                                            break;

                                                            case "outubro":
                                                                
                                                                $sqlOutubro = "SELECT Entrada FROM dinheiro WHERE Mes like 'outubro'";
                                                                $resultOutubro = $conn->query($sqlOutubro);
                                                                $cont2 = 0;
                                                                while($rowOutubro = $resultOutubro->fetch_assoc())
                                                                    {
                                                                        $cont2++;

                                                                        $entradaOutubro = $rowOutubro['Entrada'];
                                                                        
                                                                        $totalOutubro = $entradaOutubro + $varOutubroTotal;

                                                                        $varOutubroTotal = $totalOutubro;

                                                                        $varOutubro = $varOutubroTotal/$cont2;

                                                                    } 
                                                            break;

                                                            case "novembro":
                                                                
                                                                $sqlNovembro = "SELECT Entrada FROM dinheiro WHERE Mes like 'novembro'";
                                                                $resultNovembro = $conn->query($sqlNovembro);
                                                                $cont2 = 0;
                                                                while($rowNovembro = $resultNovembro->fetch_assoc())
                                                                    {
                                                                        $cont2++;

                                                                        $entradaNovembro = $rowNovembro['Entrada'];
                                                                        
                                                                        $totalNovembro = $entradaNovembro + $varNovembroTotal;

                                                                        $varNovembroTotal = $totalNovembro;

                                                                        $varNovembro = $varNovembroTotal/$cont2;

                                                                    } 
                                                            break; 

                                                            case "dezembro":
                                                                
                                                                $sqlDezembro = "SELECT Entrada FROM dinheiro WHERE Mes like 'dezembro'";
                                                                $resultDezembro = $conn->query($sqlDezembro);
                                                                $cont2 = 0;
                                                                while($rowDezembro = $resultDezembro->fetch_assoc())
                                                                    {
                                                                        $cont2++;

                                                                        $entradaDezembro = $rowDezembro['Entrada'];
                                                                        
                                                                        $totalDezembro = $entradaDezembro + $varDezembroTotal;

                                                                        $varDezembroTotal = $totalDezembro;

                                                                        $varDezembro = $varDezembroTotal/$cont2;

                                                                    } 
                                                            break; 

                                                        }
                                                    }
                                                    
    

                                                ?>    
             
                                                <script type="text/javascript">
                                                  google.charts.load('current', {'packages':['corechart']});
                                                  google.charts.setOnLoadCallback(drawChart);

                                                  function drawChart() {
                                                    var data = google.visualization.arrayToDataTable([
                                                      ['Messes', 'Entradas'],
                                                      ['Julho',  <?php echo"$varJulho";?>],
                                                      ['Agosto',  <?php echo"$varAgosto";?>],
                                                      ['Setembro',  <?php echo"$varSetembro";?>],
                                                      ['Outubro',  <?php echo"$varOutubro";?>],
                                                      ['Novembro',  <?php echo"$varNovembro";?>],
                                                      ['Dezembro',  <?php echo"$varDezembro";?>],

                                                    ]);

                                                    var options = {
                                                      title: 'Entradas semestrais',
                                                      curveType: 'function',
                                                      legend: { position: 'bottom' }
                                                    };

                                                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                                                    chart.draw(data, options);
                                                  }
                                                </script>
                                                <div id="curve_chart" style="width: 1100px; height: 550px"></div>



                                                <br><br><br>
                                                <!--SEGUNDO DASHBOARD-->
                                                <script type="text/javascript">
                                                google.charts.load('current', {'packages':['corechart']});
                                                google.charts.setOnLoadCallback(drawChart);
                                          
                                                function drawChart() {
                                          
                                                  var data = google.visualization.arrayToDataTable([
                                                    ['Categoria', 'Percentual'],
                                                    ['Categoria A',     <?php echo"$CatA";?>],
                                                    ['Categoria B',      <?php echo"$CatB";?>],
                                                    ['Categoria C',  <?php echo"$CatC";?>],
                                                    ['Categoria D', <?php echo"$CatD";?>],
                                                    ['Categoria E',    <?php echo"$CatE";?>],
                                                    ['Categoria ACC',    <?php echo"$CatAcc";?>]
                                                  ]);
                                          
                                                  var options = {
                                                    title: 'Categorias'
                                                  };
                                          
                                                  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                          
                                                  chart.draw(data, options);
                                                }
                                              </script>
                                              <div id="piechart" style="width: 1100px; height: 550px;"></div>
                                                

                                            <br><br><br>
                                            <!--TERCEIRO DASHBOARD-->
                                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                              <script type="text/javascript">
                                                google.charts.load("current", {packages:['corechart']});
                                                google.charts.setOnLoadCallback(drawChart);
                                                function drawChart() {
                                                  var data = google.visualization.arrayToDataTable([
                                                    ["Element", "Density", { role: "style" } ],
                                                    ["Julho", <?php echo "$ContJulho"; ?>, "blue"],
                                                    ["Agosto", <?php echo "$ContAgosto"; ?>, "red"],
                                                    ["Setembro", <?php echo "$ContSetembro"; ?>, "green"],
                                                    ["Outubro", <?php echo "$ContOutubro"; ?>, "color: yellow"],
                                                    ["Novembro", <?php echo "$ContNovembro"; ?>, "color: orange"],
                                                    ["Dezembro", <?php echo "$ContDezembro"; ?>, "color: gray"]
                                                  ]);

                                                  var view = new google.visualization.DataView(data);
                                                  view.setColumns([0, 1,
                                                                   { calc: "stringify",
                                                                     sourceColumn: 1,
                                                                     type: "string",
                                                                     role: "annotation" },
                                                                   2]);

                                                  var options = {
                                                    title: "Quantidade de alunos semestral",
                                                    width: 1100,
                                                    height: 550,
                                                    bar: {groupWidth: "95%"},
                                                    legend: { position: "none" },
                                                  };
                                                  var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                                                  chart.draw(view, options);
                                              }
                                              </script>
                                            <div id="columnchart_values" style="width: 1100px; height: 550px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>



    <br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>

        <?php include("footer.html");?>  

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