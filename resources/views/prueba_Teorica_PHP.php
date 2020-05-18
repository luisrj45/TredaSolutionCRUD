<?php 
/*
este punto es un ejemplo de la asignacion de valores de variable por referencia; es decir que la nueva variable simplemente referencia a la variable original. Donde los cambios a la nueva variable afectan a la variable original y los cambios a la variable original a afectan a la nueva variable,(mas claro "la nueva variable apunta o se convierte en una alias de la variable original")
 */

$z='1'; // se asigna el valor '1' a $z
$h=&$z; //se referencia  $z por medio de  $h
$h="2$h"; //se modifica $h con el numero dos delante del valor de $z
echo $h."<br>"; //se imprime $h obteniendo como resultado 21
echo $z."<br>";


/*La función var_dump () se usa para devolver la información sobre una variable. Esta función muestra información estructurada como el tipo y el valor de la variable dada. Las matrices y los objetos se exploran recursivamente con la estructura. y tambien funciona con expresiones como es el caso del siguiente ejemplo
es importante aclarar la diferencia entre los operadores de comparacion == y ===
 == siginifica igual sin ser del mismo tipo de datos
 === significa identico es decir deben ser igual valor y del mismo tipo de datos.

*/

echo (0145).'<br>';
echo var_dump( 0145 == 145)."<br>"; // imprime como resultado bool(false) donde el tipo de dato es booleano y el resultado es false; debido a que el primer valor es 0145 el cual esta escrito en sistema octal y al convertido en sistema decimal es igual 101 y el segundo esta escrito en sistema decimal por lo tanto al momento de realizar la comparacion logica (101 == 145) el resultado es falso  debido a que 101 es menor a 145 y 101 es diferente a 145;

echo var_dump('0145' == 145)."<br>";// imprime como resultado bool(true) donde el tipo de dato es booleano y el resultado es true(verdadero); debido a que el primer valor '0145' es una string que al momento de PHP manipular(esto debido a que el operador de comparacion es doble igual(==) el cual permite manipular el tipo de dato) el tipo de datos lo convierte en entero dando como resultado 145 y el segundo valor 145 es un entero por lo tanto al realizar la comparacion (145 == 145) el resultado es true(verdadero) debido a que 145 es igual a 145;
echo var_dump('0145' === 145)."<br>";// imprime como resultado bool(false) donde el tipo de dato es booleano y el resultado es false; debido a que el primer valor '0145' es una string, y el segundo valor 145 es un entero que estan comparado por el operador de comparacion Identico (===), razon por la cual php no manipula el tipo de datos, donde '0145' es diferente de 145 y el tipo de dato es diferente; string es diferente de int. 
echo var_dump('0145' === 146)."<br>";// imprime como resultado bool(false) donde el tipo de dato es booleano y el resultado es false; debido a que el primer valor '0145' es una string, y el segundo valor 146 es un entero que estan comparado por el operador de comparacion Identico (===), razon por la cual php no manipula el tipo de datos, donde '0145' es diferente de 146 y el tipo de dato es diferente; string es diferente de int.

/*
Internamente, los string de PHP son arrays de bytes
 */

$text='juan '; // asignacion de 'juan ' a la variable $text
$text[10]='perez'; /* accede a la posicion 9(esto porque los arrays comienzan en la posicion 0 ) del String 'juan ' en este caso como el string tiene solo 5 posiciones las demas posiciones son rellenadas con espacio hasta la 9 en esta posicion solo asigna el primer valor p del string 'perez' dado que sólo se realiza con los string de codificaciones monobyte */
echo $text."<br>"; // imprime el string 'juan p'


$a="3j3mpl0"; //se asigna el string "3j3mpl0" a la variable $a
$a = $a + 1; //se realiza la operacion de suma entre la variable $a y el numero 1; en este punto PHP asigna un valor numerico a la variable $a, la cual es la parte inicial numerica valida(en caso de no comenzar el valor de la variable con parte numerica valida se asigna el valor entero 0) la que se asigna a esta vararible que este caso es el numero 3; convirtiendo el string '3j3mpl0' en el valor numerico 3; 
echo $a; //se imprime $a obteniendo como resultado 4 es la suma de (3+4)


?>

