<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TiendaModel extends Model
{
use SoftDeletes;
	
   protected $table='tiendas';

    protected $primaryKey='id_tienda';


    protected $fillable =[
    	'id',
    	'nombre',
    	'fecha_apertura'
    ];
    protected $dates = ['deleted_at'];
    
}