<?php
session_start();
$id = $_SESSION['user_id'];
include("conexao.php");

//Guardando o texto
$descr = $_POST['descricao'];
if($descr != null) {
$sql = "UPDATE autoescolas SET Descricao = '$descr' WHERE Cod_Auto = '$id'";
$conn->query($sql); }

//Guardando as imagens
//diretório para salvar as imagens
$diretorio = "Imagens_Perfil/";
//Verificar a existência do diretório para salvar as imagens e informa se o caminho é um diretório
if(!is_dir($diretorio)){ 
    echo "Pasta $diretorio nao existe";
}else{    
    $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
    //loop para ler as imagens
    for ($controle = 0; $controle < count($arquivo['name']); $controle++){        
        $destino = $diretorio."/".$arquivo['name'][$controle];
        //realizar o upload da imagem em php
        //move_uploaded_file — Move um arquivo enviado para uma nova localização
        if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
            $sql = "INSERT INTO fotos ( Cod_Auto, Foto) VALUES ('$id', '$destino')";
            $conn->query($sql);
            echo "Upload realizado com sucesso<br>"; 
        }else{
        }        
    }
}

//Guardando os valores
$ACC = $_POST['ACC'];
    $sql = "SELECT * FROM valores WHERE Cod_Auto = '$id' AND Cod_Categ = 18";
    $result = $conn->query($sql);
    $contador = 0;
    while($row = $result->fetch_assoc())
    {$Cod = $row['Cod_Auto']; echo "$Cod "; $contador++;}

    if($contador == 0){
        if($ACC == NULL){
            $sql = "INSERT INTO valores ( Cod_Auto, Cod_Categ, Valor, Status) VALUES ('$id', 18, 0, 'I')";
            $conn->query($sql);
        } else {
            $sql = "INSERT INTO valores ( Cod_Auto, Cod_Categ, Valor, Status) VALUES ('$id', 18, '$ACC', 'A')";
            $conn->query($sql);
        } 
    } else {
        if($ACC != NULL){
            $sql = "UPDATE valores SET Valor = '$ACC', Status = 'A' WHERE Cod_Auto = '$id' AND Cod_Categ = 18";
            $conn->query($sql);
        } else {
            $sql = "UPDATE valores SET Valor = 0, Status = 'I' WHERE Cod_Auto = '$id' AND Cod_Categ = 18";
            $conn->query($sql);
        }
        }

$A = $_POST['A'];
    $sql = "SELECT * FROM valores WHERE Cod_Auto = '$id' AND Cod_Categ = 13";
    $result = $conn->query($sql);
    $contador = 0;
    while($row = $result->fetch_assoc())
    {$Cod = $row['Cod_Auto']; echo "$Cod "; $contador++;}

    if($contador == 0){
        if($A == NULL){
            $sql = "INSERT INTO valores ( Cod_Auto, Cod_Categ, Valor, Status) VALUES ('$id', 13, 0, 'I')";
            $conn->query($sql);
        } else {
            $sql = "INSERT INTO valores ( Cod_Auto, Cod_Categ, Valor, Status) VALUES ('$id', 13, '$A', 'A')";
            $conn->query($sql);
        } 
    } else {
        if($A != NULL){
            $sql = "UPDATE valores SET Valor = '$A', Status = 'A' WHERE Cod_Auto = '$id' AND Cod_Categ = 13";
            $conn->query($sql);
        } else {
            $sql = "UPDATE valores SET Valor = 0, Status = 'I' WHERE Cod_Auto = '$id' AND Cod_Categ = 13";
            $conn->query($sql);
        }
        }

$B = $_POST['B'];
    $sql = "SELECT * FROM valores WHERE Cod_Auto = '$id' AND Cod_Categ = 14";
    $result = $conn->query($sql);
    $contador = 0;
    while($row = $result->fetch_assoc())
    {$Cod = $row['Cod_Auto']; echo "$Cod "; $contador++;}

    if($contador == 0){
        if($B == NULL){
            $sql = "INSERT INTO valores ( Cod_Auto, Cod_Categ, Valor, Status) VALUES ('$id', 14, 0, 'I')";
            $conn->query($sql);
        } else {
            $sql = "INSERT INTO valores ( Cod_Auto, Cod_Categ, Valor, Status) VALUES ('$id', 14, '$B', 'A')";
            $conn->query($sql);
        } 
    } else {
        if($B != NULL){
            $sql = "UPDATE valores SET Valor = '$B', Status = 'A' WHERE Cod_Auto = '$id' AND Cod_Categ = 14";
            $conn->query($sql);
        } else {
            $sql = "UPDATE valores SET Valor = 0, Status = 'I' WHERE Cod_Auto = '$id' AND Cod_Categ = 14";
            $conn->query($sql);
        }
        }

$C = $_POST['C'];
    $sql = "SELECT * FROM valores WHERE Cod_Auto = '$id' AND Cod_Categ = 15";
    $result = $conn->query($sql);
    $contador = 0;
    while($row = $result->fetch_assoc())
    {$Cod = $row['Cod_Auto']; echo "$Cod "; $contador++;}

    if($contador == 0){
        if($C == NULL){
            $sql = "INSERT INTO valores ( Cod_Auto, Cod_Categ, Valor, Status) VALUES ('$id', 15, 0, 'I')";
            $conn->query($sql);
        } else {
            $sql = "INSERT INTO valores ( Cod_Auto, Cod_Categ, Valor, Status) VALUES ('$id', 15, '$C', 'A')";
            $conn->query($sql);
        } 
    } else {
        if($C != NULL){
            $sql = "UPDATE valores SET Valor = '$C', Status = 'A' WHERE Cod_Auto = '$id' AND Cod_Categ = 15";
            $conn->query($sql);
        } else {
            $sql = "UPDATE valores SET Valor = 0, Status = 'I' WHERE Cod_Auto = '$id' AND Cod_Categ = 15";
            $conn->query($sql);
        }
        }

$D = $_POST['D'];
    $sql = "SELECT * FROM valores WHERE Cod_Auto = '$id' AND Cod_Categ = 16";
    $result = $conn->query($sql);
    $contador = 0;
    while($row = $result->fetch_assoc())
    {$Cod = $row['Cod_Auto']; echo "$Cod "; $contador++;}

    if($contador == 0){
        if($D == NULL){
            $sql = "INSERT INTO valores ( Cod_Auto, Cod_Categ, Valor, Status) VALUES ('$id', 16, 0, 'I')";
            $conn->query($sql);
        } else {
            $sql = "INSERT INTO valores ( Cod_Auto, Cod_Categ, Valor, Status) VALUES ('$id', 16, '$D', 'A')";
            $conn->query($sql);
        } 
    } else {
        if($D != NULL){
            $sql = "UPDATE valores SET Valor = '$D', Status = 'A' WHERE Cod_Auto = '$id' AND Cod_Categ = 16";
            $conn->query($sql);
        } else {
            $sql = "UPDATE valores SET Valor = 0, Status = 'I' WHERE Cod_Auto = '$id' AND Cod_Categ = 16";
            $conn->query($sql);
        }
        }

$E = $_POST['E'];
    $sql = "SELECT * FROM valores WHERE Cod_Auto = '$id' AND Cod_Categ = 17";
    $result = $conn->query($sql);
    $contador = 0;
    while($row = $result->fetch_assoc())
    {$Cod = $row['Cod_Auto']; echo "$Cod "; $contador++;}

    if($contador == 0){
        if($E == NULL){
            $sql = "INSERT INTO valores ( Cod_Auto, Cod_Categ, Valor, Status) VALUES ('$id', 17, 0, 'I')";
            $conn->query($sql);
        } else {
            $sql = "INSERT INTO valores ( Cod_Auto, Cod_Categ, Valor, Status) VALUES ('$id', 17, '$E', 'A')";
            $conn->query($sql);
        } 
    } else {
        if($E != NULL){
            $sql = "UPDATE valores SET Valor = '$E', Status = 'A' WHERE Cod_Auto = '$id' AND Cod_Categ = 17";
            $conn->query($sql);
        } else {
            $sql = "UPDATE valores SET Valor = 0, Status = 'I' WHERE Cod_Auto = '$id' AND Cod_Categ = 17";
            $conn->query($sql);
        }
        }
header('Location: profile.php');
?>