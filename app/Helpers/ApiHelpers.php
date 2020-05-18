<?php
namespace App\Helpers;

class ApiHelpers
{
  	public static function createApiResponse($error,$codigo,$mensaje, $arrays){

  		$resultado=[];

  		if ($error) {
  			$resultado['success']=false;
  			$resultado['codigo']= $codigo;
  			$resultado['mensaje']=$mensaje;
  		}else{
  			$resultado['success']= true;
  			$resultado['codigo']= $codigo;
  			if ($arrays == null) {
  				$resultado['mensaje']= $mensaje;
  			}else{
  				$resultado['datos']= $arrays;

  			}
  		}
  		return $resultado;
  	} 
}
