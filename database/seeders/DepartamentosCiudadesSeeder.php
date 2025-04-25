<?php

namespace Database\Seeders;

use App\Models\Ciudad;
use App\Models\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentosCiudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamentosCiudades = [
            'Bogotá D.C.' => ['Bogotá'],
            'Antioquia' => ['Medellín', 'Bello', 'Envigado', 'Itagüí', 'Rionegro'],
            'Valle del Cauca' => ['Cali', 'Buenaventura', 'Palmira', 'Tuluá', 'Yumbo'],
            'Atlántico' => ['Barranquilla', 'Soledad', 'Malambo', 'Puerto Colombia', 'Galapa'],
            'Santander' => ['Bucaramanga', 'Floridablanca', 'Girón', 'Piedecuesta', 'Barrancabermeja'],
            'Cundinamarca' => ['Soacha', 'Zipaquirá', 'Chía', 'Mosquera', 'Facatativá'],
            'Bolívar' => ['Cartagena', 'Magangué', 'Arjona', 'Turbaco', 'El Carmen de Bolívar'],
            'Nariño' => ['Pasto', 'Ipiales', 'Tumaco', 'Túquerres', 'La Unión'],
            'Norte de Santander' => ['Cúcuta', 'Ocaña', 'Pamplona', 'Villa del Rosario', 'Los Patios'],
            'Magdalena' => ['Santa Marta', 'Ciénaga', 'Zona Bananera', 'Fundación', 'El Banco'],
            'Cauca' => ['Popayán', 'Santander de Quilichao', 'Patía', 'Puerto Tejada', 'Miranda'],
            'Tolima' => ['Ibagué', 'Espinal', 'Chaparral', 'Líbano', 'Honda'],
            'Boyacá' => ['Tunja', 'Duitama', 'Sogamoso', 'Chiquinquirá', 'Paipa'],
            'Huila' => ['Neiva', 'Pitalito', 'Garzón', 'La Plata', 'Campoalegre'],
            'Córdoba' => ['Montería', 'Cereté', 'Sahagún', 'Lorica', 'Planeta Rica'],
            'Meta' => ['Villavicencio', 'Acacías', 'Granada', 'Puerto López', 'La Macarena'],
            'Risaralda' => ['Pereira', 'Dosquebradas', 'Santa Rosa de Cabal', 'La Virginia', 'Quinchía'],
            'Cesar' => ['Valledupar', 'Aguachica', 'Agustín Codazzi', 'La Jagua de Ibirico', 'Bosconia'],
            'La Guajira' => ['Riohacha', 'Maicao', 'Uribia', 'San Juan del Cesar', 'Fonseca'],
            'Quindío' => ['Armenia', 'Calarcá', 'Montenegro', 'Quimbaya', 'La Tebaida'],
            'Caldas' => ['Manizales', 'La Dorada', 'Chinchiná', 'Villamaría', 'Neira'],
            'Sucre' => ['Sincelejo', 'Corozal', 'San Marcos', 'San Onofre', 'Sampués'],
            'Casanare' => ['Yopal', 'Aguazul', 'Villanueva', 'Paz de Ariporo', 'Tauramena'],
            'Chocó' => ['Quibdó', 'Istmina', 'Tadó', 'Acandí', 'Bahía Solano'],
            'Caquetá' => ['Florencia', 'San Vicente del Caguán', 'Puerto Rico', 'El Doncello', 'Cartagena del Chairá'],
            'Arauca' => ['Arauca', 'Saravena', 'Tame', 'Arauquita', 'Fortul'],
            'Putumayo' => ['Mocoa', 'Puerto Asís', 'Orito', 'Valle del Guamuez', 'Puerto Guzmán'],
            'San Andrés y Providencia' => ['San Andrés', 'Providencia'],
            'Amazonas' => ['Leticia', 'Puerto Nariño'],
            'Guainía' => ['Inírida'],
            'Guaviare' => ['San José del Guaviare', 'El Retorno', 'Calamar', 'Miraflores'],
            'Vaupés' => ['Mitú', 'Carurú', 'Taraira'],
            'Vichada' => ['Puerto Carreño', 'La Primavera', 'Santa Rosalía', 'Cumaribo']
        ];

        
        foreach ($departamentosCiudades as $nombreDepartamento => $ciudades) {
            $departamento = Departamento::create(['nombre' => $nombreDepartamento]);
            
            foreach ($ciudades as $nombreCiudad) {
                Ciudad::create([
                    'nombre' => $nombreCiudad,
                    'departamento_id' => $departamento->id
                ]);
            }
        }
    }
}
