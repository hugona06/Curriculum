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
        $data = $request->only(['nombre', 'dni', 'direccion', 'nota_media', 'skills', 'foto']);

        $errors = [];
        if (empty($data['nombre'])) $errors['nombre'] = 'Campo obligatorio de rellenar';
        if (empty($data['dni'])) $errors['dni'] = 'Campo obligatorio de rellenar';
        if (empty($data['direccion'])) $errors['direccion'] = 'Campo obligatorio de rellenar';

        if (!empty($errors)) {
            return back()->withErrors($errors)->withInput();
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
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
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:curricula,dni,' . $curriculum->id,
            'direccion' => 'nullable|string|max:255',
            'nota_media' => 'nullable|numeric',
            'skills' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($curriculum->foto) {
                Storage::disk('public')->delete($curriculum->foto);
            }
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        $curriculum->update($data);

        return redirect()->route('curriculums.index')->with('success', 'Curriculum actualizado con éxito');
    }

    public function destroy(Curriculum $curriculum)
    {
        if ($curriculum->foto) {
            Storage::disk('public')->delete($curriculum->foto);
        }

        $curriculum->delete();

        return redirect()->route('curriculums.index')->with('success', 'Curriculum eliminado');
    }
}