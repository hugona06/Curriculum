<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CurriculumController extends Controller
{
    public function index()
    {
        $curriculums = Curriculum::all();
        return view('curriculums.index', compact('curriculums'));
    }

    public function create()
    {
        return view('curriculums.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->only([
                'nombre', 'apellidos', 'telefono', 'correo', 'fecha_nacimiento',
                'nota_media', 'experiencia', 'formacion', 'habilidades'
            ]);

            $errors = [];
            if (empty($data['nombre'])) $errors['nombre'] = 'Campo obligatorio';
            if (empty($data['apellidos'])) $errors['apellidos'] = 'Campo obligatorio';

            if (!empty($errors)) {
                return back()->withErrors($errors)->withInput();
            }

            if ($request->hasFile('fotografia')) {
                $data['fotografia'] = $request->file('fotografia')->store('fotos', 'public');
            }

            Curriculum::create($data);

            return redirect()->route('curriculums.index')->with('success', 'Curriculum creado con éxito');

        } catch (\Exception $e) {
            return back()->withErrors(['general' => 'Error al guardar el curriculum: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(Curriculum $curriculum)
    {
        return view('curriculums.show', compact('curriculum'));
    }

    public function edit(Curriculum $curriculum)
    {
        return view('curriculums.edit', compact('curriculum'));
    }

    public function update(Request $request, Curriculum $curriculum)
    {
        try {
            $data = $request->only([
                'nombre', 'apellidos', 'telefono', 'correo', 'fecha_nacimiento',
                'nota_media', 'experiencia', 'formacion', 'habilidades'
            ]);

            $errors = [];
            if (empty($data['nombre'])) $errors['nombre'] = 'Campo obligatorio';
            if (empty($data['apellidos'])) $errors['apellidos'] = 'Campo obligatorio';

            if (!empty($errors)) {
                return back()->withErrors($errors)->withInput();
            }

            if ($request->hasFile('fotografia')) {
                if ($curriculum->fotografia) {
                    Storage::disk('public')->delete($curriculum->fotografia);
                }
                $data['fotografia'] = $request->file('fotografia')->store('fotos', 'public');
            }

            $curriculum->update($data);

            return redirect()->route('curriculums.index')->with('success', 'Curriculum actualizado con éxito');

        } catch (\Exception $e) {
            return back()->withErrors(['general' => 'Error al actualizar el curriculum: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(Curriculum $curriculum)
    {
        try {
            if ($curriculum->fotografia) {
                Storage::disk('public')->delete($curriculum->fotografia);
            }

            $curriculum->delete();

            return redirect()->route('curriculums.index')->with('success', 'Curriculum eliminado');
        } catch (\Exception $e) {
            return back()->withErrors(['general' => 'Error al eliminar el curriculum: ' . $e->getMessage()]);
        }
    }
}