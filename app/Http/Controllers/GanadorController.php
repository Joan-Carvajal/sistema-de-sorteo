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
            return redirect()->back()->withErrors(['error' => 'Aun no se selecciona un ganador']);
        }
        $ganador = User::inRandomOrder()->first();

        $this->reiniciarSistema($ganador->id);
        return redirect()->route('register');
    }
    private function reiniciarSistema($ganadorId): void
    {

        User::where('id', '!=', $ganadorId)->delete();
    }
}
