<?php

namespace App\Http\Controllers;

use App\Models\Ganador;
use App\Models\User;
use Illuminate\Http\RedirectResponse;


class GanadorController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        $userCount = User::count();

        if ($userCount < 5) {
            return redirect()->back()->with('error', 'No hay suficientes usuarios registrados para realizar el sorteo.');
        }

        $ganador= User::inRandomOrder()->first();

        Ganador::create([
            'user_id'=> $ganador->id,
            'fechaSorteo'=> now()
        ]);
        return redirect()->route('register')->with('success', '¡Se ha seleccionado un ganador!');
    }
}
