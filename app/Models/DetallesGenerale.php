<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetallesGenerale
 *
 * @property $id
 * @property $id_pedido
 * @property $placa_cabina
 * @property $indicador_cabina
 * @property $indicador_pb
 * @property $indicador_palier
 * @property $created_at
 * @property $updated_at
 *
 * @property Pedido $pedido
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetallesGenerale extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_pedido', 'placa_cabina', 'indicador_cabina', 'indicador_pb', 'indicador_palier'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pedido()
    {
        return $this->belongsTo(\App\Models\Pedido::class, 'id_pedido', 'id');
    }
    
}
