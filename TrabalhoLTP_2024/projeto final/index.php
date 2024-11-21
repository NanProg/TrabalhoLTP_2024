<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" />
    <title>Teste de site</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<div class="hub">
    <header><h1>Conversor de temperatura</h1></header>
    <form action="index.php" method="post" class="formulario">
        <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0"><img src="img/temp.png" alt="ícone de temperatura" width="45px" id="temp_icon"></a><label id="label_1" for="temperatura">Digite a temperatura: </label><input type="number" name="temperatura" id="tempinput">
        <div>
            <label><strong>De: </strong></label><select name="escala_converter" class="select">
                <option value="celsius">ºC celsius</option>
                <option value="fahrenheit">ºF fahrenheit</option>
                <option value="kelvin">K kelvin</option>
            </select>
        </div>
        <div>
        <label><strong>Para: </strong> </label><select name="escala_conversao" class="select">
            <option value="celsius">ºC celsius</option>
            <option value="fahrenheit">Fº fahrenheit</option>
            <option value="kelvin">K kelvin</option>
        </select>
        </div>
        <input type="submit" value="converter" id="submit">
    </form>
    <?= isset($_POST['temperatura'])&&isset($_POST['escala_converter'])&&isset($_POST['escala_conversao'])?"Temperatura convertida: ". conversao_temp($_POST['temperatura'], $_POST['escala_converter'], $_POST['escala_conversao']): ""?>
</div>
<div id="logo_CFK">
    <img src="img/logo.png" alt="logo_CFK" width="120px">
</div>
</body>
</html>
<?php

function conversao_temp($temperatura, $escala_converter, $escala_conversao){
    if ($escala_converter == "celsius"){
        if ($escala_conversao == "fahrenheit"){
            $valor_convertido = $temperatura * 1.8 + 32;
            if ($valor_convertido < 59) {
                return "$valor_convertido K <img src='img/temperatura_baixa' width='25px'> \n"; #frio
            } else if ($valor_convertido >= 77) {
                return "$valor_convertido K <img src='img/temperatura_alta' width='25px'> \n"; #quente
            } else {
                return "$valor_convertido K <img src='img/temp_resul.png' width='25px'> \n"; #normal
            }
        } else if ($escala_conversao == "kelvin"){
            $valor_convertido = $temperatura + 273.15; 
            return "$valor_convertido K <img src='img/temp_resul.png' width='25px'> \n";
        }
    } else if ($escala_converter == "fahrenheit"){
        if ($escala_conversao == "celsius"){
            $valor_convertido = ($temperatura - 32) * (5/9);
            return "$valor_convertido ºC \n";
        } else if ($escala_conversao == "kelvin"){
            $valor_convertido = ($temperatura - 32) * (5/9) + 273.15; 
            return "$valor_convertido K \n";
        }
    } else if ($escala_converter == "kelvin"){
        if ($escala_conversao == "celsius"){
            $valor_convertido = $temperatura - 273.15; 
            return "$valor_convertido ºC \n";
        } else if ($escala_conversao == "fahrenheit"){
            $valor_convertido = ($temperatura - 273.15) * (9/5) + 32;
            return "$valor_convertido ºF \n";
        }
    }
}