@extends('layouts.app')

@section('content')
<div class="barra-superior">
    <a href="{{ route('curriculums.index') }}">⬅ Volver a listado de Curriculums</a>
</div>

<div class="container">
    <h1 class="titulo">Listado de Curriculums</h1>

    <a href="{{ route('curriculums.create') }}" class="boton-crear">Crear Curriculum</a>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if($curriculums->isEmpty())
        <p>No hay curriculums agregados aún.</p>
    @else
        <div class="grid-cards">
            @foreach($curriculums as $curriculum)
                <div class="card" style="background-image: url('{{ asset('storage/' . $curriculum->fotografia) }}')">
                    <div class="card-content">
                        <p><strong>Nombre:</strong> {{ $curriculum->nombre }} {{ $curriculum->apellidos }}</p>
                        <p><strong>Teléfono:</strong> {{ $curriculum->telefono }}</p>
                        <p><strong>Nota media:</strong> {{ $curriculum->nota_media }}</p>
                        <div class="botones">
                            <a href="{{ route('curriculums.show', $curriculum->id) }}" class="boton-ver">Ver</a>
                            <a href="{{ route('curriculums.edit', $curriculum->id) }}" class="boton-editar">Editar</a>
                            <form action="{{ route('curriculums.destroy', $curriculum->id) }}" method="POST" onsubmit="return confirm('¿Seguro de borrar?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="boton-borrar">Borrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection