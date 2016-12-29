<?php
    $operador=$_POST["operar"];

    if( $operador == "+" ){
        $titulo = "Sumar";

    } elseif( $operador == "-" ){
        $titulo = "Restar";

    } elseif( $operador == "*" ){
        $titulo = "Multiplicar";

    } elseif( $operador == "/" ){
        $titulo = "Dividir";
    } else {
        header('Location: index.html');
    }
?>
<html>
<head>
    <title><?php echo $titulo; ?></title>
    <meta http-equiv='content-type' content='text/html; charset=UTF-8'/>
</head>
    <body>
        <h1>Calculadora: <?php echo $titulo; ?></h1>


        <form id="formCalculadora" name="formOperar" method="post" action="resultado.php">
            <?php echo $titulo; ?> <input type="text" name="operando1" tabindex=1 autofocus/>
             <input type="submit" name="operador" value="<?php echo $operador; ?>" tabindex=3/>
            <input type="text" name="operando2" tabindex=2/>
        </form>
    </body>
</html>