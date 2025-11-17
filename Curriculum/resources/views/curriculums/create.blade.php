@extends('layouts.app')

@section('content')
<div class="barra-superior">
    <a href="{{ route('curriculums.index') }}">⬅ Volver a listado de Curriculums</a>
</div>

<div class="container">
    <h1 class="titulo">Crear Curriculum</h1>

    @error('general')
        <p class="error-general">{{ $message }}</p>
    @enderror

    <form action="{{ route('curriculums.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grupo-input">
            @error('nombre') <p class="error-campo">{{ $message }}</p> @enderror
            <label>Nombre:</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" class="input" required>
        </div>

        <div class="grupo-input">
            @error('apellidos') <p class="error-campo">{{ $message }}</p> @enderror
            <label>Apellidos:</label>
            <input type="text" name="apellidos" value="{{ old('apellidos') }}" class="input" required>
        </div>

        <div class="grupo-input">
            @error('telefono') <p class="error-campo">{{ $message }}</p> @enderror
            <label>Teléfono:</label>
            <input type="text" name="telefono" value="{{ old('telefono') }}" class="input">
        </div>

        <div class="grupo-input">
            @error('correo') <p class="error-campo">{{ $message }}</p> @enderror
            <label>Correo:</label>
            <input type="email" name="correo" value="{{ old('correo') }}" class="input">
        </div>

        <div class="grupo-input">
            @error('fecha_nacimiento') <p class="error-campo">{{ $message }}</p> @enderror
            <label>Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="input">
        </div>

        <div class="grupo-input">
            @error('nota_media') <p class="error-campo">{{ $message }}</p> @enderror
            <label>Nota Media:</label>
            <input type="number" step="0.01" name="nota_media" value="{{ old('nota_media') }}" class="input">
        </div>

        <div class="grupo-input">
            @error('experiencia') <p class="error-campo">{{ $message }}</p> @enderror
            <label>Experiencia:</label>
            <textarea name="experiencia" class="input">{{ old('experiencia') }}</textarea>
        </div>

        <div class="grupo-input">
            @error('formacion') <p class="error-campo">{{ $message }}</p> @enderror
            <label>Formación:</label>
            <textarea name="formacion" class="input">{{ old('formacion') }}</textarea>
        </div>

        <div class="grupo-input">
            @error('habilidades') <p class="error-campo">{{ $message }}</p> @enderror
            <label>Habilidades:</label>
            <textarea name="habilidades" class="input">{{ old('habilidades') }}</textarea>
        </div>

        <div class="grupo-input">
            @error('fotografia') <p class="error-campo">{{ $message }}</p> @enderror
            <label>Fotografía:</label>
            <input type="file" name="fotografia" class="input" accept="image/*">
        </div>

        <div class="botones">
            <button type="submit" class="boton-guardar">Guardar Curriculum</button>
            <a href="{{ route('curriculums.index') }}" class="boton-volver-form">Volver</a>
        </div>
    </form>
</div>
@endsection
