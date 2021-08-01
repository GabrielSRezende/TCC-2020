<?php

session_start();

 include("Login_v13/init.php");
 include("Login_v13/check.php");
 include("conexao.php");

$id = $_SESSION['user_id'];



$sql = "SELECT * FROM cliente WHERE Cod_Auto = $id";

$sql_instrutor = "SELECT * FROM instrutor WHERE Cod_Auto = $id";

$sql_veiculo = "SELECT * FROM veiculo WHERE Cod_Auto = $id";

$con = $conn->query($sql) or die($conn->error);

$feth_aluno_up = $conn->query($sql) or die($conn->error);

$fetch_instrutor = $conn->query($sql_instrutor) or die($conn->error);

$fetch_veiculo = $conn->query($sql_veiculo) or die($conn->error);

$fetch_instrutor_up = $conn->query($sql_instrutor) or die($conn->error);

$fetch_veiculo_up = $conn->query($sql_veiculo) or die($conn->error);

    setlocale(LC_TIME, 'portuguese'); 
    date_default_timezone_set('America/Sao_Paulo');

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

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

<link rel="stylesheet" href="agenda/css/style.css">


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/404dc552ae.js" crossorigin="anonymous"></script>

<style>
    .row-clicked {
        background-color: green;
    }
</style>
</head>

  <?php include("Topmenu2.html");?> 

<body>
  <form id="frmAgenda" name="frmAgenda" method="POST">
    <input type="hidden" id="hdnCodAluno" name="hdnCodAluno" value="0">
    <input type="hidden" id="hdnVeiculo" name="hdnVeiculo" value="0">
    <input type="hidden" id="hdnInstrutor" name="hdnInstrutor" value="0">
    <input type="hidden" id="hdnData" name="hdnData" value="0">

    <input type="hidden" id="hdnCodAluno_up" name="hdnData" value="0">
    <input type="hidden" id="hdnData_up" name="hdnData" value="0">
    <input type="hidden" id="hdnCodAula_up" name="hdnData" value="0">
    <input type="hidden" id="hdnInstrutor_up" name="hdnData" value="0">
    <input type="hidden" id="hdnVeiculo_up" name="hdnData" value="0">
    <input type="hidden" id="hdnCodAula_del" name="hdnData" value="0">

    <div id="app"></div>

    
 


<!-- Modal Cadastra-->
      <div class="modal fade" id="modalCadastra" tabindex="-1" role="dialog" aria-labelledby="modalCadastraTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Aula</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row justify-content-md-center">
                <div class="col-md-4">
                  <label>Horario Inicio:</label>
                  <input type="time" id="txtHoraInicio" name="txtHoraInicio" class="form-control">
                </div>
                <div class="col-md-4">
                  <label>Horario Termino:</label>
                  <input type="time" id="txtHoratermino" name="txtHoratermino" class="form-control">
                </div>
              </div>
              <br>
              <div class="row">
                <nav class="navbar navbar-light bg-light" style="width: 100%" onclick="view(document.getElementById('tbl_aluno'))">
                  <label>Aluno</label>
                </nav>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="">
                      <table id="tbl_aluno" class="table" style="width:100%;display: none;text-align: center;">
                            <thead>
                                <tr style="font-size:13px">                                    
                                    
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>CPF</th>
                                </tr>
                            </thead>
                            <tbody style="font-size:13px">
                              <tr data-id="null" class="tr-aluno" onclick="changeBgColor(this,document.getElementById('hdnCodAluno'))">                                       
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                </tr>
                                <?php while($dado = $con->fetch_array()) { ?>
                                  
                                    <tr data-id="<?php echo $dado['Cod_Cli']; ?>" class="tr-aluno" onclick="changeBgColor(this,document.getElementById('hdnCodAluno'))">                                       
                                        
                                        <td><?php echo $dado['Nome_Cli']; ?></td>
                                        <td><?php echo $dado['Email']; ?></td>
                                        <td><?php echo $dado['CPF']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr style="font-size:13px">                                    
                                    
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>CPF</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <br>
              <div class="row">
                <nav class="navbar navbar-light bg-light" style="width: 100%" onclick="view(document.getElementById('tbl_instrutor'))">
                  <label>Instrutor</label>                                  
                </nav>
              </div>
              <br>  
              <div class="row">
                <div class="col-md-12">
                  <div class="">
                      <table id="tbl_instrutor" class="table" style="width:100%;display: none;text-align: center;">
                            <thead>
                                <tr style="font-size:13px">                                    
                                    
                                    <th>Nome</th>
                                    <th>CPF</th>
                                </tr>
                            </thead>
                            <tbody style="font-size:13px">
                                <?php while($dado = $fetch_instrutor->fetch_array()) { ?>
                                  
                                    <tr data-id="<?php echo $dado['Cod_Ins']; ?>" class="tr-aluno"  onclick="changeBgColor(this,document.getElementById('hdnInstrutor'))">                                       
                                        
                                        <td><?php echo $dado['Nome']; ?></td>                                
                                        <td><?php echo $dado['CPF']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr style="font-size:13px">                                    
                                    
                                    <th>Nome</th>
                                    <th>CPF</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <br>
              <div class="row">
                <nav class="navbar navbar-light bg-light" style="width: 100%" onclick="view(document.getElementById('tbl_veiculo'))">
                  <label>Veiculo</label>
                </nav>
              </div>  
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="">
                      <table id="tbl_veiculo" class="table" style="width:100%;display: none;text-align: center;">
                            <thead>
                                <tr style="font-size:13px">                                                                        
                                    <th>Modelo</th>
                                    <th>Marca</th>
                                    <th>Placa</th>
                                </tr>
                            </thead>
                            <tbody style="font-size:13px">
                                <?php while($dado = $fetch_veiculo->fetch_array()) { ?>
                                  
                                    <tr data-id="<?php echo $dado['Cod_Vei']; ?>" class="tr-aluno" onclick="changeBgColor(this,document.getElementById('hdnVeiculo'))">                                       
                                        
                                        <td><?php echo $dado['Modelo']; ?></td>                                
                                        <td><?php echo $dado['Marca']; ?></td>
                                        <td><?php echo $dado['Placa']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr style="font-size:13px">                                    
                                    
                                    <th>Modelo</th>
                                    <th>Marca</th>
                                    <th>Placa</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" onclick="cadastraAula()">Cadastrar aula</button>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalCadastraTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Atualizar Aula</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-md-center">
          <div class="col-md-4">
            <label>Horario Inicio:</label>
            <input type="time" id="txtHoraInicio_up" name="txtHoraInicio_up" class="form-control">
          </div>
          <div class="col-md-4">
            <label>Horario Termino:</label>
            <input type="time" id="txtHoratermino_up" name="txtHoratermino_up" class="form-control">
          </div>
        </div>
        <br>
        <div class="row">
          <nav class="navbar navbar-light bg-light" style="width: 100%" onclick="view(document.getElementById('tbl_aluno_up'))">
            <label>Aluno</label>
          </nav>
        </div>
        <br>
          <div class="row">
            <div class="col-md-12">
              <div class="">
                  <table id="tbl_aluno_up" class="table" style="width:100%;display: none;text-align: center;">
                        <thead>
                            <tr style="font-size:13px">                                    
                                
                                <th>Nome</th>
                                <th>Email</th>
                                <th>CPF</th>
                            </tr>
                        </thead>
                        <tbody style="font-size:13px">
                            <?php while($dado = $feth_aluno_up->fetch_array()) { ?>
                              
                                <tr data-id="<?php echo $dado['Cod_Cli']; ?>" class="tr-aluno" onclick="changeBgColor(this,document.getElementById('hdnCodAluno_up'))">                                       
                                    
                                    <td><?php echo $dado['Nome_Cli']; ?></td>
                                    <td><?php echo $dado['Email']; ?></td>
                                    <td><?php echo $dado['CPF']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr style="font-size:13px">                                    
                                
                                <th>Nome</th>
                                <th>Email</th>
                                <th>CPF</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <br>
          <div class="row">
            <nav class="navbar navbar-light bg-light" style="width: 100%" onclick="view(document.getElementById('tbl_instrutor_up'))">
              <label>Instrutor</label>                                  
            </nav>
          </div>
          <br>  
          <div class="row">
            <div class="col-md-12">
              <div class="">
                  <table id="tbl_instrutor_up" class="table" style="width:100%;display: none;text-align: center;">
                        <thead>
                            <tr style="font-size:13px">                                    
                                
                                <th>Nome</th>
                                <th>CPF</th>
                            </tr>
                        </thead>
                        <tbody style="font-size:13px">
                            <?php while($dado = $fetch_instrutor_up->fetch_array()) { ?>
                              
                                <tr data-id="<?php echo $dado['Cod_Ins']; ?>" class="tr-aluno"  onclick="changeBgColor(this,document.getElementById('hdnInstrutor_up'))">                                       
                                    
                                    <td><?php echo $dado['Nome']; ?></td>                                
                                    <td><?php echo $dado['CPF']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr style="font-size:13px">                                    
                                
                                <th>Nome</th>
                                <th>CPF</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <br>
          <div class="row">
            <nav class="navbar navbar-light bg-light" style="width: 100%" onclick="view(document.getElementById('tbl_veiculo_up'))">
              <label>Veiculo</label>
            </nav>
          </div>  
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="">
                  <table id="tbl_veiculo_up" class="table" style="width:100%;display: none;text-align: center;">
                        <thead>
                            <tr style="font-size:13px">                                                                        
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Placa</th>
                            </tr>
                        </thead>
                        <tbody style="font-size:13px">
                            <?php while($dado = $fetch_veiculo_up->fetch_array()) { ?>
                              
                                <tr data-id="<?php echo $dado['Cod_Vei']; ?>" class="tr-aluno" onclick="changeBgColor(this,document.getElementById('hdnVeiculo_up'))">                                       
                                    
                                    <td><?php echo $dado['Modelo']; ?></td>                                
                                    <td><?php echo $dado['Marca']; ?></td>
                                    <td><?php echo $dado['Placa']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr style="font-size:13px">                                    
                                
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Placa</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" onclick="upadate_aluno()">Atualizar</button>
          </div>
      </div>
    </div>
  </div>
</div>

     


  </form>
<br><br><br><br><br>
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
</body>
</html>




<script src="agenda/js/script.js"></script>
<script type="text/javascript">
  $(".showEvent").click(function() {
  var x =$(".event-date").val();
  
});
</script>


<script type="text/javascript">
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tbl_aluno tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Filtrar '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#tbl_aluno').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        },
        info: false,
        paging: false,
        searching: false

    });
 
} );
</script>

<script type="text/javascript">
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tbl_instrutor tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Filtrar '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#tbl_instrutor').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        },
        info: false,
        paging: false,
        searching: false
    });
 
} );
</script>

<script type="text/javascript">
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tbl_veiculo tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Filtrar '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#tbl_veiculo').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        },
        info: false,
        paging: false,
        searching: false
    });
 
} );
</script>


<script type="text/javascript">
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tbl_aluno_up tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Filtrar '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#tbl_aluno_up').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        },
        info: false,
        paging: false,
        searching: false

    });
 
} );
</script>

<script type="text/javascript">
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tbl_instrutor_up tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Filtrar '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#tbl_instrutor_up').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        },
        info: false,
        paging: false,
        searching: false
    });
 
} );
</script>

<script type="text/javascript">
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tbl_veiculo_up tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Filtrar '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#tbl_veiculo_up').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        },
        info: false,
        paging: false,
        searching: false
    });
 
} );
</script>


<script type="text/javascript">
function changeBgColor(element,hdn) {
  $('#tbl_veiculos tbody tr').removeClass('row-clicked');

    if(element.className === 'row-clicked') {
        element.className = '';
    } else {
        element.className = 'row-clicked';
    }
    
    let id = $(element).data("id");
    hdn.value = id;    
}
</script>

<script type="text/javascript">
  function cadastraAula(){

    let data_aula = document.getElementById('hdnData').value;
    let hr_inicio = document.getElementById('txtHoraInicio').value;
    let hr_fim = document.getElementById('txtHoratermino').value;
    let id_aluno = document.getElementById('hdnCodAluno').value;
    let id_instrutor = document.getElementById('hdnInstrutor').value;
    let id_veiculo = document.getElementById('hdnVeiculo').value;

    console.log(data_aula);
    console.log(hr_inicio);
    console.log(hr_fim);
    console.log(id_aluno);


  $.ajax({
      type : "POST",
      url : "http://localhost/web-app/tcc/greatseo-testes-2/ajax/cadastra_horario_aula.php", 
      data: { data_aula: data_aula, hr_inicio: hr_inicio, hr_fim: hr_fim,id_aluno: id_aluno,id_instrutor,id_veiculo, },
      success : function(response) {
        
          
    },
      error : function(response) {
        console.log("error..!! - ajax insere aulas");
      }
    });
  $('#modalCadastra').modal('hide')
  }


</script>
<script type="text/javascript">
  function getCodAula(element){
    let id = $(element).data("idaula");
    document.getElementById('hdnCodAula_up').value = id;
    alert(document.getElementById('hdnCodAula_up').value)
    $('#modalUpdate').modal('show');    
  }
  function getCodAulaDel(element){
    let id = $(element).data("idaula");
    document.getElementById('hdnCodAula_del').value = id;
    alert(document.getElementById('hdnCodAula_del').value)
       
  }
</script>


<script>
function upadate_aluno(){
  
    let data_aula = document.getElementById('hdnData').value;
    let hr_inicio = document.getElementById('txtHoraInicio_up').value;
    let hr_fim = document.getElementById('txtHoratermino_up').value;
    let id_aluno = document.getElementById('hdnCodAluno_up').value;
    let id_aula = document.getElementById('hdnCodAula_up').value;
    let id_instrutor = document.getElementById('hdnInstrutor_up').value;
    let id_veiculo = document.getElementById('hdnVeiculo_up').value;

    console.log(data_aula);
    console.log(hr_inicio);
    console.log(hr_fim);
    console.log(id_aluno);

  $.ajax({
      
      type : "POST",
      url : "http://localhost/web-app/tcc/greatseo-testes-2/ajax/update_aula.php", 
      data: { data_aula: data_aula, hr_inicio: hr_inicio, 
        hr_fim: hr_fim,id_aluno: id_aluno, id_aula: id_aula, id_veiculo: id_veiculo, id_instrutor: id_instrutor
       },  
      success : function(response) {
        
          
    },
      error : function(response) {
        console.log("error..!! - ajax update aulas");
      }
    });
  $('#modalUpdate').modal('hide')
}
</script>  

<script>
function delete_aluno(){
  
    let id_aula = document.getElementById('hdnCodAula_del').value;

    console.log(id_aula);

  $.ajax({
      
      type : "POST",
      url : "http://localhost/web-app/tcc/greatseo-testes-2/ajax/delete_aula.php", 
      data: { id_aula: id_aula, },  
      success : function(response) {
        
          
    },
      error : function(response) {
        console.log("error..!! - ajax deleta aulas");
      }
    });
}
</script>

<script>
  function view(element){
    if ( element.style.display == "none") {
      element.setAttribute('style', 'display: block;')
    }
    else{
      element.setAttribute('style', 'display: none;')
    }
  }
</script>