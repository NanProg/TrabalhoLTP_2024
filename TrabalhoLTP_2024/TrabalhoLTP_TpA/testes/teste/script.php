<?php
$temperatura = $_POST['temperatura'];
$escala_converter = $_POST['escala_converter'];
$escala_conversao = $_POST['escala_conversao'];

echo "Temperatura convertida: ". conversao_temp($temperatura, $escala_converter, $escala_conversao);

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