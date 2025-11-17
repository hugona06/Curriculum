@extends('layouts.app')

@section('content')
<div class="barra-superior">
    <a href="{{ route('curriculums.index') }}">⬅ Volver a listado de Curriculums</a>
</div>

<div class="container">
    <h1 class="titulo">Editar Curriculum</h1>

    @error('general')
        <p class="error-general">{{ $message }}</p>
    @enderror

    <form action="{{ route('curriculums.update', $curriculum->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grupo-input">
            @error('nombre')
                <p class="error-campo">{{ $message }}</p>
            @enderror
            <label>Nombre:</label>
            <input type="text" name="nombre" value="{{ old('nombre', $curriculum->nombre) }}" class="input" required>
        </div>

        <div class="grupo-input">
            @error('dni')
                <p class="error-campo">{{ $message }}</p>
            @enderror
            <label>DNI:</label>
            <input type="text" name="dni" value="{{ old('dni', $curriculum->dni) }}" class="input" required>
        </div>

        <div class="grupo-input">
            @error('direccion')
                <p class="error-campo">{{ $message }}</p>
            @enderror
            <label>Dirección:</label>
            <input type="text" name="direccion" value="{{ old('direccion', $curriculum->direccion) }}" class="input" required>
        </div>

        <div class="grupo-input">
            @error('nota_media')
                <p class="error-campo">{{ $message }}</p>
            @enderror
            <label>Nota Media:</label>
            <input type="number" step="0.01" name="nota_media" value="{{ old('nota_media', $curriculum->nota_media) }}" class="input">
        </div>

        <div class="grupo-input">
            @error('skills')
                <p class="error-campo">{{ $message }}</p>
            @enderror
            <label>Skills:</label>
            <textarea name="skills" class="input">{{ old('skills', $curriculum->skills) }}</textarea>
        </div>

        <div class="grupo-input">
            @error('foto')
                <p class="error-campo">{{ $message }}</p>
            @enderror
            <label>Foto:</label>
            @if($curriculum->foto)
                <div class="foto-grande">
                    <img src="{{ asset('storage/' . $curriculum->foto) }}" alt="Foto actual" class="foto-grande">
                </div>
            @endif
            <input type="file" name="foto" class="input" accept="image/*">
        </div>

        <div class="botones">
            <button type="submit" class="boton-guardar">Guardar Cambios</button>
            <a href="{{ route('curriculums.index') }}" class="boton-volver-form">Volver</a>
        </div>

    </form>
</div>
@endsection
