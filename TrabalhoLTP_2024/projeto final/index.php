<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de site</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="hub">
    <header><h1>Conversor de temperatura</h1></header>
    <form action="index.php" method="post" class="formulario">
        <label id="label_1" for="temperatura">Digite a temperatura: </label><input type="number" name="temperatura" id="tempinput">
        <div>
            <label><strong>De: </strong></label><select name="escala_converter" class="select">
                <option value="celsius">Cº celsius</option>
                <option value="fahrenheit">Fº fahrenheit</option>
                <option value="kelvin">K kelvin</option>
            </select>
        </div>
        <div>
        <label><strong>Para: </strong> </label><select name="escala_conversao" class="select">
            <option value="celsius">celsius</option>
            <option value="fahrenheit">fahrenheit</option>
            <option value="kelvin">kelvin</option>
        </select>
        </div>
        <input type="submit" value="converter" id="submit">
    </form>
    <?=isset($_POST['temperatura'])&&isset($_POST['escala_converter'])&&isset($_POST['escala_conversao'])?"Temperatura convertida: ". conversao_temp($_POST['temperatura'], $_POST['escala_converter'], $_POST['escala_conversao']): ""?>
</div>
<img src="/img/logo.png" width="150px" alt="logo" id="img">
</body>
</html>
<?php

function conversao_temp($temperatura, $escala_converter, $escala_conversao){
    if ($escala_converter == "celsius"){
        if ($escala_conversao == "fahrenheit"){
            $valor_convertido = $temperatura * 1.8 + 32;
            return "$valor_convertido ºF \n";
        } else if ($escala_conversao == "kelvin"){
            $valor_convertido = $temperatura + 273.15; 
            return "$valor_convertido K \n";
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