<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposFuncionamiento
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Acceso[] $accesos
 * @property DetallesPuerta[] $detallesPuertas
 * @property Pedido[] $pedidos
 * @property TiposControle[] $tiposControles
 * @property TiposPuerta[] $tiposPuertas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TiposFuncionamiento extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accesos()
    {
        return $this->hasMany(\App\Models\Acceso::class, 'id', 'id_tipo_funcionamiento');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallesPuertas()
    {
        return $this->hasMany(\App\Models\DetallesPuerta::class, 'id', 'id_tipo_funcionamiento');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany(\App\Models\Pedido::class, 'id', 'id_tipo_funcionamiento');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tiposControles()
    {
        return $this->hasMany(\App\Models\TiposControle::class, 'id', 'id_tipo_funcionamiento');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tiposPuertas()
    {
        return $this->hasMany(\App\Models\TiposPuerta::class, 'id', 'id_tipo_funcionamiento');
    }
    
}
