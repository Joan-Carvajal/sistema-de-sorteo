<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Ganador;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Inertia\Inertia;
use Inertia\Response;

class RegistroController extends Controller
{
    public function index(): Response{
        $departementos = Departamento::all();
        

        $ganadorCount = Ganador::count();
        $ganador = null;
        if ($ganadorCount > 0) {
            $ganador = Ganador::with('user')->latest()->first();
        }

        return Inertia::render('Landing');
    }

    public function ciudades($departementoId): JsonResponse{
        $ciudades = Ciudad::where('departamento_id', $departementoId)->get();
        return response()->json($ciudades);
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|alpha',
            'apellido' => 'required|alpha',
            'cedula' => 'required|numeric|unique:users',
            'departamento_id' => 'required|exists:departamentos,id',
            'ciudad_id' => 'required|exists:ciudades,id',
            'celular' => 'required|numeric',
            'email' => 'required|email',
            'habeas' => 'required|accepted',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create($request->all());

        return redirect()->back()->with('success', '¡Registro completado con éxito!');
    }
}
