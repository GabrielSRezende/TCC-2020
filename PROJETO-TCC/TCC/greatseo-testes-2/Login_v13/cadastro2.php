<?php 
$pegar = $_GET['Email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V13</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
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

	<script src="js/main.js"></script>
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

</head>
<body style="background-color: #999999;">

	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" action="cadastro.php" method="POST">
					<span class="login100-form-title p-b-59">
						Cadastre-se
					</span>

					<div class="wrap-input100 validate-input" data-validate="Campo Nome é obrigatório!">
						<span class="label-input100">Nome fantasia</span>
						<input class="input100" onkeypress="return letras()" type="text" id="name" name="name" placeholder="Nome...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Campo Nome é obrigatório!">
						<span class="label-input100">Razão social</span>
						<input class="input100" type="text" id="username" name="username" placeholder="Nome de usuário...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Campo E-mail é obrigatório!">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" onblur="return validaEmailEdi(this)" name="email" id="email" placeholder="Endereço de email..." value="<?php echo $pegar ;?>">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Campo Senha é obrigatório!">
						<span class="label-input100">Senha</span>
						<input class="input100" type="Password" id="pass" name="pass" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repetir a Senha é obrigatório!">
						<span class="label-input100">Repita a senha</span>
						<input class="input100" type="Password" name="repeat-pass" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Campo CNPJ é obrigatório!">
						<span class="label-input100">CNPJ</span>
						<input class="input100" type="cnpj" name="cnpj" id="cnpj" placeholder="00.000.000/0000-00">
						<span class="focus-input100"></span>
					</div>
        

					<div class="wrap-input100 validate-input" data-validate = "Campo CEP é obrigatório!">
						<span class="label-input100">CEP</span>
						<input class="input100" type="text" name="Cep_Cadastro_Autoescola" id="Cep_Cadastro_Autoescola" placeholder="Rua...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Campo Endereço é obrigatório!">
						<span class="label-input100">Endereço</span>
						<input class="input100" type="text" name="end" id="end" placeholder="Rua...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Campo Bairro é obrigatório!">
						<span class="label-input100">Bairro</span>
						<input class="input100" type="text" name="Bairro_Cadastro_Autoescola" id="Bairro_Cadastro_Autoescola" placeholder="Rua...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Campo Cidade é obrigatório!">
						<span class="label-input100">Cidade</span>
						<input class="input100" onkeypress="return letras()" type="text" name="Cidade_Cadastro_Autoescola" id="Cidade_Cadastro_Autoescola" placeholder="Rua...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Campo UF é obrigatório!">
					
					<span class="label-input100">UF</span>   
                    <select id="txtUfCadastro" name="txtUfCadastro" id="txtUfCadastro" class="form-control">
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
                    <span class="focus-input100"></span>
                </div>

					<div class="wrap-input100 validate-input" data-validate = "Campo Número é obrigatório!">
						<span class="label-input100">Numero</span>
						<input class="input100" type="text" name="Numero_Cadastro_Autoescola" id="Numero_Cadastro_Autoescola" placeholder="Rua...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Campo Complemento é obrigatório!">
						<span class="label-input100">Complemento</span>
						<input class="input100" type="text" name="comp" placeholder="Apto xxxx">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Campo Telefone é obrigatório!">
						<span class="label-input100">Telefone Celular</span>
						<input class="input100 tel" type="Telefone" name="telc" id="telc" placeholder="(xx)xxxxx-xxxx">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Campo Telefone é obrigatório!">
						<span class="label-input100">Telefone fixo</span>
						<input class="input100 tel" type="Telefone" name="telf" id="telf" placeholder="(xx)xxxx-xxxx">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									Eu concordo com os
									<a href="#" class="txt2 hov1">
										termos de uso
									</a>
								</span>
							</label>
						</div>

						
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button  class="login100-form-btn">
								Cadastre-se
							</button>
						</div>

						<a href="login.html" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Possui conta? Entrar
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>

<!---------------------------------------------------- teste------------------------------>
	
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<script>
    $(document).ready(function(){   
        $("#cnpj").mask("99.999.999/9999-99");
        $("#Numero_Cadastro_Autoescola").mask("999999");
        $("#Cep_Cadastro_Autoescola").mask("99999-999"); 
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
    $("#Cep_Cadastro_Autoescola").focusout(function(){
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
                    $("#end").val(resposta.logradouro);
                    $("#Bairro_Cadastro_Autoescola").val(resposta.bairro);
                    $("#Cidade_Cadastro_Autoescola").val(resposta.localidade);
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
	var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	function validaEmailEdi() {
		if((!filter.test(document.getElementById("txtEmailCadastro").value)) && document.getElementById("txtEmailCadastro").value.length > 0){
		alert('Por favor, digite um e-mail válido');
		document.getElementById("txtEmailCadastro").value = '';
		document.getElementById("txtEmailCadastro").focus;
		}
	}
</script>
