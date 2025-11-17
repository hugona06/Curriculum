@extends('layouts.app')

@section('content')
<div class="barra-superior">
    <a href="{{ route('curriculums.index') }}">⬅ Volver a listado de Curriculums</a>
</div>

<div class="container">
    <div class="show-card">
        @if($curriculum->fotografia)
            <img src="{{ asset('storage/' . $curriculum->fotografia) }}" alt="{{ $curriculum->nombre }}" class="show-foto">
        @endif
        <div class="show-info">
            <h1>{{ $curriculum->nombre }} {{ $curriculum->apellidos }}</h1>
            <p><strong>Teléfono:</strong> {{ $curriculum->telefono }}</p>
            <p><strong>Correo:</strong> {{ $curriculum->correo }}</p>
            <p><strong>Fecha de nacimiento:</strong> {{ $curriculum->fecha_nacimiento->format('d/m/Y') }}</p>
            <p><strong>Nota media:</strong> {{ $curriculum->nota_media }}</p>
            <p><strong>Experiencia:</strong> {{ $curriculum->experiencia }}</p>
            <p><strong>Formación:</strong> {{ $curriculum->formacion }}</p>
            <p><strong>Habilidades:</strong> {{ $curriculum->habilidades }}</p>
        </div>
    </div>
</div>
@endsection
