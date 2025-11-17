@extends('layouts.app')

@section('content')
<div class="container">

    <div class="barra-superior">
        <a href="{{ route('curriculums.index') }}" class="boton-volver">⬅ Volver a listado de Curriculums</a>
    </div>

    <h1 class="titulo">{{ $curriculum->nombre }}</h1>

    @if($curriculum->foto)
        <img src="{{ asset('storage/' . $curriculum->foto) }}" class="foto-grande" alt="Foto del curriculum">
    @endif

    <p><strong>DNI:</strong> {{ $curriculum->dni }}</p>
    <p><strong>Dirección:</strong> {{ $curriculum->direccion }}</p>
    <p><strong>Nota media:</strong> {{ $curriculum->nota_media }}</p>

    <h3>Skills:</h3>
    <p>{{ $curriculum->skills }}</p>

</div>
@endsection
