<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoModel extends Model
{
use SoftDeletes;
	
   protected $table='productos';

    protected $primaryKey='id';


    protected $fillable =[
    	'sku',
    	'nombre',
    	'descripcion',
    	'tienda',
    	'valor',
    	'imagen',
    ];
    protected $dates = ['deleted_at'];
    
}