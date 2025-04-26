<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromArray, WithHeadings, ShouldAutoSize
{
    public function array(): array
    {
        return User::with(['departamento', 'ciudad'])
            ->get()
            ->map(function ($user) {
                return [
                    'Nombre' => $user->nombre,
                    'Apellido' => $user->apellido,
                    'Cédula' => (string) $user->cedula,
                    'Celular' => (string)$user->celular,
                    'Departamento' => $user->departamento->nombre ,
                    'Ciudad' => $user->ciudad->nombre ,
                    'Email' => $user->email,
                ];
            })
            ->toArray();
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Apellido',
            'Cédula',
            'Celular',
            'Departamento',
            'Ciudad',
            'Email',
        ];
    }
}
