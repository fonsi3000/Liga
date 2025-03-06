<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function store(Request $request)
    {
        // Validación mejorada
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => [
                'required',
                'email:rfc,dns', // Validación DNS para correos reales
                'unique:usuarios,email',
                'max:255'
            ],
            'celular' => [
                'required',
                'string',
                'regex:/^3\d{9}$/', // Que empiece por 3 y tenga exactamente 10 dígitos
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
        ]);

        // Guardar en la base de datos
        Usuario::create($validated);

        // Responder según el tipo de solicitud
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => '¡Te has unido a la Liga de los Sueños!'
            ]);
        }

        // Respuesta tradicional para solicitudes no-AJAX
        return redirect()->back()->with('success', '¡Te has unido a la Liga de los Sueños!');
    }
}
