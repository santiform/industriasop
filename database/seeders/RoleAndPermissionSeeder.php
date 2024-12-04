<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos
        Permission::create(['name' => 'ver pedidos']);
        Permission::create(['name' => 'editar pedidos']);
        Permission::create(['name' => 'eliminar pedidos']);

        // Crear roles y asignar permisos
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(['ver pedidos', 'editar pedidos', 'eliminar pedidos']);

        $clientRole = Role::create(['name' => 'cliente']);
        $clientRole->givePermissionTo(['ver pedidos']);
    }
}
