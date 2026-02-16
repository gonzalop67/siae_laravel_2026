<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'SUPER ADMIN']);
        Role::create(['name' => 'ADMINISTRADOR']);
        Role::create(['name' => 'AUTORIDAD']);
        Role::create(['name' => 'DECE']);
        Role::create(['name' => 'DOCENTE']);
        Role::create(['name' => 'INSPECCION']);
        Role::create(['name' => 'REPRESENTANTE']);
        Role::create(['name' => 'SECRETARIA']);
        Role::create(['name' => 'TUTOR']);

        User::factory()->create([
            'name' => 'Ing. Gonzalo Peñaherrera E.',
            'email' => 'administrador_siae@gmail.com',
            'password' => bcrypt('gP67M24e$'),
            'titulo' => 'Ing.',
            'titulo_descripcion' => 'Ingeniero en Sistemas Informáticos y de Computación', 
            'apellidos' => 'Peñaherrera Escobar',
            'nombres' => 'Gonzalo Nicolás',
            'shortname' => 'Ing. Gonzalo Peñaherrera',
            'fullname' => 'Peñaherrera Escobar Gonzalo Nicolás',
            'foto' => 'gonzalofoto.jpg',
            'genero' => 'M'
        ])->assignRole('SUPER ADMIN');

        $this->call(TablaConfiguracionSeeder::class);
    }

    protected function truncateTablas(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
