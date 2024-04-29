<?php
//El codigo php se coloca al principio para que, de esta forma, pueda ejecutarse el envio y recepcion de los datos del formulario de la calculadora
//en este mismo archivo. Esto se hizo asi ya que, como es una calculadora, la idea es que muestre el resultado en la misma pagina, en lugar de
//enviarte a otro sitio

    //Aqui se esta indicando que, si efectivamente se ha pulsado el boton "submit" (que en este caso, es el boton para calcular)
    //recibira los valores del formulario de mas abajo dentro de este if
    if(isset($_POST['submit'])){

        //$numero1 recibe el primer numero enviado
        $numero1 = $_POST['numero1'];

        //$numero2 recibe el segundo numero enviado
        $numero2 = $_POST['numero2'];

        //$operacion recibe el signo de la operacion a realizar
        //Puede ser suma (+), resta (x), multiplicacion (X) o division (/)
        $operacion = $_POST['operacion'];

        //Esta es una iteracion muy sencilla
        //Solo esta diciendo que compruebe el valor contenido dentro de la variable $operaicion
        //De acuerdo a este, actuara de una u otra forma. Es decir, sumará, restará, multiplicará o dividirá
        if($operacion == "suma"){
            $respuesta = $numero1 + $numero2;
        }else if ($operacion == "resta") {
            $respuesta = $numero1 - $numero2;
        }else if ($operacion == "multiplicacion"){
            $respuesta = $numero1 * $numero2;
        }else if($operacion = "division"){
            $respuesta = $numero1 / $numero2;
        }

        //El valor de las operaciones, fuese cual fuese la que se ejecutase, será guardado dentro de la variable $respuesta
        //Esta variable será utilizada mas adelante
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link type = "text/css" rel = "stylesheet" href = "css/estilo.css">
</head>
<body>
    <!--Aqui inicia el codigo para la parte visual de la calculadora-->
    <!-- Los div, name y class son para el CSS que será explicado en otro archivo-->
    <div id = "calculadora-id">

        <!--Aqui se crea un formulario, con metodo post, el cual en lugar de ser enviado a otra pagina a través del action,
        será enviado al mismo archivo, solo que a una parte diferente. Concretamente hablando, será lanzado hacia el codigo
        PHP que se vió al inicio. Esto es gracias a la funcion $_SERVER['PHP_SELF'] -->
        <form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>">

            <!--Se crea el campo para el primer numero -->
            <input type = "number" name = "numero1" required>
            <br><br>

            <!--Se crea el campo para seleccionar la operacion a realizar. 
            En este caso, a través de un select, se creará una pequeña pestaña desplegable
            la cual contendrá las cuatro operaciones basicas de la calculadora.
            Además de estas, habrá un quinto valor vacío para el estado default de la misma-->
            <select name = "operacion" required>
                <option value = ""></option>
                <option value = "suma">+</option>
                <option value = "resta">-</option>
                <option value = "multiplicacion">X</option>
                <option value = "division">/</option>
            </select>
            <br><br>

            <!--Se crea el campo para el segundo numero -->
            <input type = "number" name = "numero2" required>
            <br><br>

            <!--Algo importante es que los tres campos indican 'required' es decir 'requerido'
            esto significa que el formulario no podrá enviarse si alguno de ellos está vacio-->

            <!--Se crea el botón de enviado del formulario, que en este caso estará decorado con CSS para que diga 'calcular' -->
            <input type = "submit" name = "submit" value = "Calcular">
        </form>

        <!--Se crea un campo para mostrar la respuesta de la operacion solicitada -->
        <!--Para logra esto, se establcerá el valor del input con php, haciendo que reciba el valor contenido
        dentro de la variable respuesta, el cual se determinó en el codigo php del inicio -->
        <div id = "respuesta-id">
             <input type = "textfield" value = "<?php echo $respuesta;?>" autocomplete = "off" readonly>
        </div>
    </div>
</body>
</html>