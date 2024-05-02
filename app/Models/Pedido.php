<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 *
 * @property $id
 * @property $id_tipo_obra
 * @property $id_tipo_funcionamiento
 * @property $id_tipo_control
 * @property $id_tipo_puerta
 * @property $id_acceso
 * @property $nombre
 * @property $email
 * @property $telefono
 * @property $direccion_obra
 * @property $created_at
 * @property $updated_at
 *
 * @property TiposPuerta $tiposPuerta
 * @property TiposControle $tiposControle
 * @property Acceso $acceso
 * @property TiposObra $tiposObra
 * @property TiposFuncionamiento $tiposFuncionamiento
 * @property DetallesGenerale[] $detallesGenerales
 * @property DetallesPuerta[] $detallesPuertas
 * @property HabilitacionesAcceso[] $habilitacionesAccesos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pedido extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_tipo_obra', 'id_tipo_funcionamiento', 'id_tipo_control', 'id_tipo_puerta', 'id_acceso', 'nombre', 'email', 'telefono', 'direccion_obra'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposPuerta()
    {
        return $this->belongsTo(\App\Models\TiposPuerta::class, 'id_tipo_puerta', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposControle()
    {
        return $this->belongsTo(\App\Models\TiposControle::class, 'id_tipo_control', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function acceso()
    {
        return $this->belongsTo(\App\Models\Acceso::class, 'id_acceso', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposObra()
    {
        return $this->belongsTo(\App\Models\TiposObra::class, 'id_tipo_obra', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposFuncionamiento()
    {
        return $this->belongsTo(\App\Models\TiposFuncionamiento::class, 'id_tipo_funcionamiento', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallesGenerales()
    {
        return $this->hasMany(\App\Models\DetallesGenerale::class, 'id', 'id_pedido');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallesPuertas()
    {
        return $this->hasMany(\App\Models\DetallesPuerta::class, 'id', 'id_pedido');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function habilitacionesAccesos()
    {
        return $this->hasMany(\App\Models\HabilitacionesAcceso::class, 'id', 'id_pedido');
    }
    
}
