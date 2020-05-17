<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class LogicaController extends Controller
{
    public function multiplos(Request $request)
    {
        $title="Multiplos de 3 y 5";
        $n=trim($request->get('search'));
        $suma=0;

        for ($i=1; $i<$n ; $i++) 
        { 
           if ($i%3==0 || $i%5==0) //e valida si es multiplo de 3 o 5
           {
            $valores[$i]=$i; //se guarda el multiplo de 3 o 5 en un array
            $suma+=$i; //se suma el valor de cada multiplo de 3 o 5 
           }
        }
        if($suma == 0)//valido que la variable suma sea igual a cero para asignarle un valor 0 al array y evitar errores en laravel 
        { 
            $valores[0]=0;
        }
        if ($n=="" || $n==null) { //valido que la variable $n sea igual a vacio o nulo para asignarle el 0 como valor al array y evitar errores en laravel 
        { 
            $query=0;

        }else{
        $query=$n; //de lo contrario $query se le asigna el valor de $n
        }
        return view('logica.multiplos',compact('title','valores','suma','query'));

    }

    public function camelcase(Request $request)
    {
        $title="camel case";
        $string=trim($request->get('search'));

           $i = array("-","_");
           $str = str_replace($i, ' ', $string); //reemplazar los caracteres - y _ por espacios en blanco en la cadena string 
           $str = str_replace(' ', '', ucwords(strtolower($str)));//quitar los espcios en blanco donde la funcion ucwords a convertido la primera letra de cada palabra en mayusculas despued de haber convertido todo el string en minuscula 
           $str = substr($string,0,1).substr($str,1);//luego se toma el primer caracter del string original y se concatena con el resto de la cadena convertida anteriormente esto con el objetivo de mantener el caracter original de la cadena dada
       
        return view('logica.camelcase',compact('title','string','str'));

    }
    public function frase(Request $request)
    {
        $title="palabra Invertida";
        //$parrafo="Bienvenido a Treda Solutions";
        $cadena = trim($request->get('search'));
        //guardo las palabras en un array  
        $parrafo[0]=""; 
        $array_cadena = str_word_count($cadena, 1);
        //saco cada elemento del array 
            foreach ($array_cadena as $palabra) 
            {
                $texto=$palabra; //asigno el valor de palabra a $texto
                if (strlen($palabra)>5) //verifico que la palabras tenga mas de seis letra
                { 
                    $texto= strrev($palabra); //asigno el valor de la palabra invertida a $texto
                }
            $parrafo[]=$texto. " ";//concateno el valor de $texto y agrego un espacio a cada concatenacion
            }
            //$parrafo==trim($parrafo);//quita los los espacion en blanco del parrafo
        return view('logica.frase',compact('title','parrafo','cadena'));

    }

}