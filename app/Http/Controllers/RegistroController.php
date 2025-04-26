<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Ganador;
use App\Models\User;
use Illuminate\Http\RedirectResponse;


use Inertia\Inertia;
use Inertia\Response;

class RegistroController extends Controller
{
    public function index(): Response{
        $departementos = Departamento::all();
        $ciudades = Ciudad::all();
        $ganadorCount = Ganador::count();
        $ganador = null;
        if ($ganadorCount > 0) {
            $ganador = Ganador::with('user')->latest()->first();
        }

        return Inertia::render('Landing', compact('departementos', 'ganador', 'ciudades'));
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        User::create($request->validated());
        $userCount = User::count();
        
        if ($userCount === 5) {   
            $ganador = User::inRandomOrder()->first();
            Ganador::create([
                'user_id' => $ganador->id,
                'fechaSorteo' => now()
            ]);
            
        }
        return redirect()->back()->with('success', '¡Registro completado con éxito!');
    }
}
