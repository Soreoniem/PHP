<?php
    $operando1=$_POST["operando1"];
    $operador=$_POST["operador"];
    $operando2=$_POST["operando2"];

    $salir = false;

    if( is_numeric($operando1) && is_numeric($operando2) ){
        if( $operador == "+" ){
            $titulo = "Suma";
            $resultado = $operando1 + $operando2;

        } elseif( $operador == "-" ){
            $titulo = "Resta";
            $resultado = $operando1 - $operando2;

        } elseif( $operador == "*" ){
            $titulo = "Multiplicación";
            $resultado = $operando1 * $operando2;

        } elseif( $operador == "/" ){
            if($operando2 == 0){
                $salir = true;
            }
            $titulo = "División";
            $resultado = $operando1 / $operando2;
        }

    } else {
        $salir = true;
    }
    if( $salir ){
        header("location:javascript://history.go(-1)");
    }
    $resultado = round($resultado, 2);

?>
<html>
    <head>
        <title><?php echo $titulo; ?></title>
        <meta http-equiv='content-type' content='text/html; charset=UTF-8'/>
    </head>
    <body>
        <h1>Calculadora: Resultado</h1>

        <p>
            La <?php echo $titulo; ?> de <?php echo $operando1; ?> y <?php echo $operando2; ?> es: <?php echo $resultado; ?>
        </p>
        <form id="formVolver" name="formCalculadora" method="post" action="index.html">
            <input type="submit" name="volver" value="Nuevo Calculo"/>
        </form>
    </body>
</html>