<?php

session_start();

 //include("Login_v13/init.php");
 //include("Login_v13/check.php");
 include("../conexao.php");

$id = $_SESSION['cod_cli'];
$cod_auto = $_SESSION['cod_auto'];
//echo $_SESSION['user_id'];
//echo $_SESSION['cod_auto'];



$sql = "SELECT * FROM agenda WHERE Cod_Auto = $cod_auto and Cod_Cli = 0";

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

<body>
  <form id="frmAgenda" name="frmAgenda" method="POST">

    <input type="hidden" id="hdnCodAluno" name="hdnCodAluno" value="<?php echo $id ?>">
    <input type="hidden" id="hdnData" name="hdnData" value="0">
    <input type="hidden" id="hdnCodAula" name="hdnCodAula" value="0">
    <input type="hidden" id="hdnTimeOver" name="hdnTimeOver" value="0">
    <input type="hidden" id="hdnTimeStart" name="hdnTimeStart" value="0">
    

    <div id="app"></div>

    

<div class="modal fade" id="modalCadastra" tabindex="-1" role="dialog" aria-labelledby="modalCadastraTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Marcar Aula</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="">
                  <table id="tbl_aluno" class="table" style="width:100%;text-align: center;">
                        <thead>
                            <tr style="font-size:13px">                                    
                                
                                <th>Inicio</th>
                                <th>Termino</th>
                            </tr>
                        </thead>
                        <tbody style="font-size:13px">

                              
                                <tr data-id=""  data-start="" data-over="" class="tr-aluno">
                                    <td></td>
                                    <td></td>
                                </tr>
                        </tbody>
                       <!--
                        <tfoot>
                            <tr style="font-size:13px">                                    
                                <th>Inicio</th>
                                <th>Termino</th>
                            </tr>
                        </tfoot>
                      -->
                    </table>
                </div>
            </div>
        </div>
        <br>   
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" onclick="upadate_aluno()">Salvar</button>
        </div>
      </div>
    </div>
  </div>
</div>

</form>
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
    // DataTable
    var table = $('#tbl_aluno').DataTable({
        info: false,
        paging: false,
        searching: false

    });
 
} );
</script>


<script type="text/javascript">
function changeBgColor(element,hdn) {
$('#tbl_aluno tbody tr').removeClass('row-clicked');
    if(element.className === 'row-clicked') {
        element.className = '';
    } else {
        element.className = 'row-clicked';
    }
    
    let id = $(element).data("id");
    let timeover = $(element).data("over");
    let timestart = $(element).data("start");
    hdn.value = id;    
    document.getElementById('hdnTimeStart').value = timestart;    
    document.getElementById('hdnTimeOver').value = timeover;    
}
</script>


<script>
function upadate_aluno(){
  
    let data_aula = document.getElementById('hdnData').value;
    let hr_inicio = document.getElementById('hdnTimeStart').value;
    let hr_fim = document.getElementById('hdnTimeOver').value;
    let id_aluno = document.getElementById('hdnCodAluno').value;
    let id_aula = document.getElementById('hdnCodAula').value;
    

    console.log(data_aula);
    console.log(hr_inicio);
    console.log(hr_fim);
    console.log(id_aluno);

  $.ajax({
      
      type : "POST",
      url : "http://localhost/MobileTCC4/app/ajax/update_aula.php", 
      data: {  
        id_aula: id_aula,
        id_aluno: id_aluno
       },  
      success : function(response) {
        
          
    },
      error : function(response) {
        console.log("error..!! - ajax update aulas");
      }
    });
  $.ajax({
              type : "POST",
              url : "http://localhost/MobileTCC4/app/ajax/consulta_agenda.php", 
              data: { date: date,  },
              success : function(response) {
                console.log("boaa");
            
               var arrayJson = JSON.parse(response);
               var alunos = arrayJson.alunos;
               console.log(alunos); 
                for (var i = 0, l = alunos.length; i < l; i++) {
                var content = `<div class="alert alert-dark alert-dismissible fade show" id="hr_alunos" role="alert">`;
                content +=  `<i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;&nbsp;`;
                content +=  alunos[i].horaInicial;
                content +=  "&nbsp;&nbsp;&nbsp;";
                content +=  alunos[i].horaFinal;                
                content += `</div>`;
                

                  $('.events-today').append(content);
                }
            },
              error : function(response) {
                console.log("error..!! - ajax consulta aulas");
              }
            });
  $('#modalCadastra').modal('hide');
}
</script>  


