<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HabilitacionesAcceso
 *
 * @property $id
 * @property $id_pedido
 * @property $parada
 * @property $salida_a
 * @property $salida_b
 * @property $created_at
 * @property $updated_at
 *
 * @property Pedido $pedido
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class HabilitacionesAcceso extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_pedido', 'parada', 'salida_a', 'salida_b'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pedido()
    {
        return $this->belongsTo(\App\Models\Pedido::class, 'id_pedido', 'id');
    }
    
}
