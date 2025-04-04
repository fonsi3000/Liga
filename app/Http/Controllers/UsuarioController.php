<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function store(Request $request)
    {
        // Validación de datos incluyendo el campo 'empresa'
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => [
                'required',
                'email:rfc,dns', // Validación estricta
                'unique:usuarios,email',
                'max:255',
            ],
            'celular' => [
                'required',
                'string',
                'regex:/^3\d{9}$/', // Comienza con 3, 10 dígitos
            ],
            'empresa' => [
                'required',
                'in:Espumas Medellín S.A,Espumados del Litoral',
            ],
        ], [
            // Mensajes personalizados
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',

            'celular.required' => 'El número de celular es obligatorio.',
            'celular.regex' => 'El número de celular debe comenzar con 3 y tener 10 dígitos.',

            'empresa.required' => 'La empresa es obligatoria.',
            'empresa.in' => 'La empresa seleccionada no es válida.',
        ]);

        // Guardar al usuario
        Usuario::create($validated);

        // Si es una solicitud AJAX o espera JSON (como Fetch API)
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => '¡Te has unido a la Liga de los Sueños!',
            ]);
        }

        // Para solicitudes normales
        return redirect()->back()->with('success', '¡Te has unido a la Liga de los Sueños!');
    }
}
