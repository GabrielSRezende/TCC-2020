<?php 
            session_start();
            include("../login/init.php");
            include("../login/check.php");
            include("../conexao.php"); 
            $username = $_SESSION['user_name'];
            $id = $_SESSION['cod_cli'];

            $autoescola = $_POST['autoescola'];
                $Valor = 0; $Valor13 = 0; $Valor14 = 0; $Valor15 = 0; $Valor16 = 0; $Valor17 = 0;
                $text1 = ''; $text2 = ''; $text3 = ''; $text4 = ''; $text5 = ''; $text6 = '';
                $sql2 = "SELECT * FROM valores WHERE Cod_Auto = $autoescola";
                $result2 = $conn->query($sql2);
                while($row = $result2->fetch_assoc()){
                    $CodCateg = $row['Cod_Categ'];
                    switch ($CodCateg) {
                        case 18:
                            $Status = $row['Status'];
                        if($Status == 'A'){
                            $Valor = $row['Valor'];
                        } else {
                            $Valor = 0;
                            $text1 = '- (Não trabalha com isso)';
                        }
                            break; 

                        case 13:
                            $Status = $row['Status'];
                        if($Status == 'A'){
                            $Valor13 = $row['Valor'];
                        } else {
                            $Valor13 = 0;
                            $text2 = '- (Não trabalha com isso)';
                        }
                            break;

                        case 14:
                            $Status = $row['Status'];
                        if($Status == 'A'){
                            $Valor14 = $row['Valor'];
                        } else {
                            $Valor14 = 0;
                            $text3 = '- (Não trabalha com isso)';
                        }
                            break;  

                        case 15:
                            $Status = $row['Status'];
                        if($Status == 'A'){
                            $Valor15 = $row['Valor'];
                        } else {
                            $Valor15 = 0;
                            $text4 = '- (Não trabalha com isso)';
                        }
                            break;  

                        case 16:
                            $Status = $row['Status'];
                        if($Status == 'A'){
                            $Valor16 = $row['Valor'];
                        } else {
                            $Valor16 = 0;
                            $text5 = '- (Não trabalha com isso)';
                        }
                            break;   

                        case 17:
                            $Status = $row['Status'];
                        if($Status == 'A'){
                            $Valor17 = $row['Valor'];
                        } else {
                            $Valor17 = 0;
                            $text6 = '- (Não trabalha com isso)';
                        }
                            break;      
                    }                  
                } 
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="../login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="../login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/css/util.css">
    <link rel="stylesheet" type="text/css" href="../login/css/main.css">
<!--===============================================================================================-->
</head>
<body >
    
    <div class="">
        <div class="container-login100" style="background-color: yellow; ">
            <div class="wrap-login100" >
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST" action="pagamentoInterno.php">
                    <span class="login100-form-title">
                        Área de pagamento
                    </span>

                    <div style="text-align: center;">
                            <input style="margin-top: 4%;" type="checkbox" name="valor" value="<?php echo $Valor; ?>" placeholder="Telefone pessoal">
                            
                                <span class="txt1">
                                    Categoria ACC - 
                                </span>
                                <a class="txt2" href="#">
                                    R$ <?php echo $Valor; ?>,00 <?php echo $text1; ?>
                                </a>
                        </div>
                    <div style="text-align: center;">
                            <input style="margin-top: 4%;" type="checkbox" name="valor2" value="<?php echo $Valor13; ?>" placeholder="Telefone pessoal">
                            
                                <span class="txt1">
                                    Categoria A - 
                                </span>
                                <a class="txt2" href="#">
                                    R$ <?php echo $Valor13; ?>,00 <?php echo $text2; ?>
                                </a>
                        </div>
                    <div style="text-align: center;">
                            <input style="margin-top: 4%;" type="checkbox" name="valor3" value="<?php echo $Valor14; ?>" placeholder="Telefone pessoal">
                            
                                <span class="txt1">
                                    Categoria B - 
                                </span>
                                <a class="txt2" href="#">
                                    R$ <?php echo $Valor14; ?>,00 <?php echo $text3; ?>
                                </a>
                        </div>
                    <div style="text-align: center;">
                            <input style="margin-top: 4%;" type="checkbox" name="valor4" value="<?php echo $Valor15; ?>" placeholder="Telefone pessoal">
                            
                                <span class="txt1">
                                    Categoria C - 
                                </span>
                                <a class="txt2" href="#">
                                    R$ <?php echo $Valor15; ?>,00 <?php echo $text4; ?>
                                </a>
                        </div>
                    <div style="text-align: center;">
                            <input style="margin-top: 4%;" type="checkbox" name="valor5" value="<?php echo $Valor16; ?>" placeholder="Telefone pessoal">
                            
                                <span class="txt1">
                                    Categoria D - 
                                </span>
                                <a class="txt2" href="#">
                                    R$ <?php echo $Valor16; ?>,00 <?php echo $text5; ?>
                                </a>
                        </div>
                    <div style="text-align: center;">
                            <input style="margin-top: 4%;" type="checkbox" name="valor6" value="<?php echo $Valor17; ?>" placeholder="Telefone pessoal">
                            
                                <span class="txt1">
                                    Categoria E - 
                                </span>
                                <a class="txt2" href="#">
                                    R$ <?php echo $Valor17; ?>,00 <?php echo $text6; ?>
                                </a>
                        </div>
                        <input type="hidden" name="teste" value="<?php echo $autoescola; ?>">

                    <!--<label style="
                        background-color: #3498db;
                        border-radius: 5px;
                        color: #fff;
                        cursor: pointer;
                        margin: 10px;
                        padding: 6px 20px"
                        for='selecao-arquivo'>Selecione uma foto para perfil &#187;</label>
                    <input name="foto" id='selecao-arquivo' type='file'>-->
                    
                    <hr>

                        <div style="text-align: center;">
                                <i class="fa fa-credit-card" aria-hidden="true"></i>
                                <a class="txt2" href="#">
                                    Cartão
                                </a>
                        </div>
                         <div style="text-align: center;">
                                <i class="fa fa-paypal" aria-hidden="true"></i>
                                <a class="txt2" href="#">
                                    Paypal
                                </a>
                        </div>

                    <div class="container-login100-form-btn">
                        <input type="submit" name="" onclick="Pagar()" class="login100-form-btn" value="Pague agora">
                            
                        
                    </div>

                    <div class="text-center p-t-50">
                        <a class="txt2" href="index.html">
                            Algum problema? Nos contate.
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        Pagar() {
            alert('Pagamento efetuado');
        }
    </script>

    
<!--===============================================================================================-->  
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>