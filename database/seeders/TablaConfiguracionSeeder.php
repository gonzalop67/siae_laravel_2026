<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaConfiguracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('configurations')->insert([
            'nombre' => 'UNIDAD EDUCATIVA PCEI FISCAL SALAMANCA',
            'direccion' => 'Calle el Tiempo y Pasaje Mónaco',
            'telefono' => '2256311/2254818',
            'nombre_rector' => 'DR. RAMIRO CASTILLO',
            'genero_rector' => 'M',
            'nombre_vicerrector' => 'Lic. Rómulo Mejía',
            'genero_vicerrector' => 'M',
            'nombre_secretario' => 'Lic. Alicia Salazar O.',
            'genero_secretario' => 'F',
            'email' => '17h00215d5@gmail.com',
            'url' => 'http://colegionocturnosalamanca.com',
            'logo' => 'logo_salamanca.gif',
            'amie' => '17H00215',
            'ciudad' => 'Quito D.M.'
        ]);
    }
}
