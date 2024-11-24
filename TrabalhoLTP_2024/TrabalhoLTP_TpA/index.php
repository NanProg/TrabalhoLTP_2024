<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>CFK - Conversor</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<div class="hub_superior"> 
    <div id="logo_3D"> <!-- Logo da Escola Técnica 3D no qual o trabalho foi proposto pelo orientador Gabriel Lyra, turma RGI42 de 2024 -->
        <a href="https://3dcolegios.com/" target="_blank"><img src="img/3Dlogo.png" alt="Logo da 3D Colégios" width="100px"></a>
    </div>
    <div id="logo_tema"> <!-- ícone no qual possui duas tags que se completam para cumprir sua função, a tag <img> que serve para implementar uma imagem no corpo do site e <a> para redirecionar o cliente para outro lugar caso seja clicado, ou também como forma de incoporar um arquivo e o usuário baixar assim que clicado sobre. -->
        <a href="index2.php"><img src="img/escuro.png" alt="ícone tema escuro" width="40px"></a>
    </div>
</div>

<div class="hub_principal"> <!-- Container que contém o formuário e o resultado do processamento de dados. -->
    <div class="hub">
        <header><h1>Conversor de temperatura</h1></header>
        <form action="index.php" method="post" class="formulario"> <!-- formulário onde será obtido os dados, sendo trabalhado através do "index.php", o próprio arquivo no qual se encontra o script -->
            <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0"><img src="img/temp.png" alt="ícone de temperatura" width="45px" id="temp_icon"></a><label id="label_1" for="temperatura">Digite a temperatura: </label><input type="number" name="temperatura" id="tempinput"> <!-- caixa de resposta para receber o valor da temperatura -->
            <div>
                <label><strong>De: </strong></label><select name="escala_converter" class="select"> <!-- caixa de seleção para selecionar a escala em que a temperatura se encontra -->
                    <option value="celsius">ºC celsius</option>
                    <option value="fahrenheit">ºF fahrenheit</option>
                    <option value="kelvin">K kelvin</option>
                </select>
            </div>
            <div>
            <label><strong>Para: </strong> </label><select name="escala_conversao" class="select"> <!-- caixa de seleção para selecionar a escala o qual deseja converter a temperatura -->
                <option value="celsius">ºC celsius</option>
                <option value="fahrenheit">Fº fahrenheit</option>
                <option value="kelvin">K kelvin</option>
            </select>
            </div>
            <input type="submit" value="converter" id="submit"> <!-- botão de enviar -->
        </form>
        <?= isset($_POST['temperatura'])&&isset($_POST['escala_converter'])&&isset($_POST['escala_conversao'])? conversao_temp($_POST['temperatura'], $_POST['escala_converter'], $_POST['escala_conversao']): ""?> <!--isset verifica se variável foi definida, ou seja, se foi declarada e seu valor diferente de null, também é requisitado a function "conversao_temp()" -->
    </div>
</div>
<div id="logo_CFK"> <!-- logo próprio do site "CFK"-->
    <a href="https://www.youtube.com/watch?v=QwLvrnlfdNo"><img src="img/logo.png" alt="logo_CFK" width="120px"></a>
</div>
</body>
</html>
<?php

function conversao_temp($temperatura, $escala_converter, $escala_conversao){
    if ($escala_converter == "celsius"){ #verifica de qual escala é a temperatura
        if ($escala_conversao == "fahrenheit"){ #verifica para qual escala deseja se converter a temperatura
            $valor_convertido = $temperatura * 1.8 + 32; #cálculo
            if ($valor_convertido < 59) {
                return "<strong> Temperatura convertida: </strong>$valor_convertido ºF <img src='img/temperatura-baixa.png' width='25px'> \n"; #frio
            } else if ($valor_convertido >= 77) {
                return "<strong> Temperatura convertida: </strong>$valor_convertido ºF <img src='img/temperatura-alta.png' width='25px'> \n"; #quente
            } else {
                return "<strong> Temperatura convertida: </strong>$valor_convertido ºF <img src='img/temp_resul.png' width='25px'> \n"; #normal
            }
        } else if ($escala_conversao == "kelvin"){ #verifica para qual escala deseja se converter a temperatura
            $valor_convertido = $temperatura + 273.15; #cálculo
            if ($valor_convertido < 288.15) {
                return "<strong> Temperatura convertida: </strong>$valor_convertido K <img src='img/temperatura-baixa.png' width='25px'> \n"; #frio
            } else if ($valor_convertido >= 298.15) {
                return "<strong> Temperatura convertida: </strong>$valor_convertido K <img src='img/temperatura-alta.png' width='25px'> \n"; #quente
            } else {
                return "<strong> Temperatura convertida: </strong>$valor_convertido K <img src='img/temp_resul.png' width='25px'> \n"; #normal
            }
        } else if ($escala_conversao == "celsius") { 
            return ("valor não convertido, pois são ambas a mesma escala."); #caso o valor de $escala_converter seja a mesma que $escala_conversao irá imprimir a não possibilidade de conversão da temperatura
        }
    } else if ($escala_converter == "fahrenheit"){ #verifica de qual escala é a temperatura
        if ($escala_conversao == "celsius"){ #verifica para qual escala deseja se converter a temperatura
            $valor_convertido = ($temperatura - 32) * (5/9); #cálculo
            if ($valor_convertido < 15) {
                return "<strong> Temperatura convertida: </strong>$valor_convertido ºC <img src='img/temperatura-baixa.png' width='25px'> \n"; #frio
            } else if ($valor_convertido >= 25) {
                return "<strong> Temperatura convertida: </strong>$valor_convertido ºC <img src='img/temperatura-alta.png' width='25px'> \n"; #quente
            } else {
                return "<strong> Temperatura convertida: </strong>$valor_convertido ºC <img src='img/temp_resul.png' width='25px'> \n"; #normal
            }
        } else if ($escala_conversao == "kelvin"){ #verifica para qual escala deseja se converter a temperatura
            $valor_convertido = ($temperatura - 32) * (5/9) + 273.15; #cálculo 
            if ($valor_convertido < 288.15) {
                return "<strong> Temperatura convertida: </strong>$valor_convertido K <img src='img/temperatura-baixa.png' width='25px'> \n"; #frio
            } else if ($valor_convertido >= 298.15) {
                return "<strong> Temperatura convertida: </strong>$valor_convertido K <img src='img/temperatura-alta.png' width='25px'> \n"; #quente
            } else {
                return "<strong> Temperatura convertida: </strong>$valor_convertido K <img src='img/temp_resul.png' width='25px'> \n"; #normal
            } 
        }  else if ($escala_conversao == "fahrenheit") {
            return ("valor não convertido, pois são ambas a mesma escala."); #caso o valor de $escala_converter seja a mesma que $escala_conversao irá imprimir a não possibilidade de conversão da temperatura
        }

    } else if ($escala_converter == "kelvin"){ #verifica de qual escala é a temperatura
        if ($escala_conversao == "celsius"){ #verifica para qual escala deseja se converter a temperatura
            $valor_convertido = $temperatura - 273.15; #cálculo
            if ($valor_convertido < 15) {
                return "<strong> Temperatura convertida: </strong>$valor_convertido ºC <img src='img/temperatura-baixa.png' width='25px'> \n"; #frio
            } else if ($valor_convertido >= 25) {
                return "<strong> Temperatura convertida: </strong>$valor_convertido ºC <img src='img/temperatura-alta.png' width='25px'> \n"; #quente
            } else {
                return "<strong> Temperatura convertida: </strong>$valor_convertido ºC <img src='img/temp_resul.png' width='25px'> \n"; #normal
            }
        } else if ($escala_conversao == "fahrenheit"){ #verifica para qual escala deseja se converter a temperatura
            $valor_convertido = ($temperatura - 273.15) * (9/5) + 32; #cálculo
            if ($valor_convertido < 59) {
                return "<strong> Temperatura convertida: </strong>$valor_convertido ºF <img src='img/temperatura-baixa.png' width='25px'> \n"; #frio
            } else if ($valor_convertido >= 77) {
                return "<strong> Temperatura convertida: </strong>$valor_convertido ºF <img src='img/temperatura-alta.png' width='25px'> \n"; #quente
            } else {
                return "<strong> Temperatura convertida: </strong>$valor_convertido ºF <img src='img/temp_resul.png' width='25px'> \n"; #normal
            }
        } else if ($escala_conversao == "kelvin") {
            return ("valor não convertido, pois são ambas a mesma escala."); #caso o valor de $escala_converter seja a mesma que $escala_conversao irá imprimir a não possibilidade de conversão da temperatura
        } 
    }
}