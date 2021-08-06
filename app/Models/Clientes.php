<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'cod_cliente',
        'nom_cliente',
        'dire_cliente',
        'dpi_cliente',
    ];

    protected $primaryKey = 'cod_cliente';

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
