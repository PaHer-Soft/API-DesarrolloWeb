<?php


namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Clientes extends Authenticatable
{
    protected $table = 'clientes';

    protected $fillable = [
        'nom_cliente',
        'dire_cliente',
        'dpi_cliente',
    ];

    protected $primaryKey = 'cod_cliente';

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
