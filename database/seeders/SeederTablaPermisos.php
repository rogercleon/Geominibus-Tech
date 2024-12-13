<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            'Ver rol',
            'Crear rol',
            'Editar rol',
            'Borrar rol',

            'Ver conductor',
            'Crear conductor',
            'Editar conductor',
            'Borrar conductor',

            'Ver minibus',
            'Crear minibus',
            'Editar minibus',
            'Borrar minibus',

            'Ver Asig minibus',
            'Crear Asig minibus',
            'Editar Asig minibus',
            'Borrar Asig minibus',

            'Ver ruta',
            'Crear ruta',
            'Editar ruta',
            'Borrar ruta',

            'Ver cliente',
            'Crear cliente',
            'Editar cliente',
            'Borrar cliente',

            'Ver horario',
            'Crear horario',
            'Editar horario',
            'Borrar horario',

            'Ver boleto',
            'Crear boleto',
            'Editar boleto',
            'Borrar boleto',

            'Ver encomienda',
            'Crear encomienda',
            'Editar encomienda',
            'Borrar encomienda',
        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
