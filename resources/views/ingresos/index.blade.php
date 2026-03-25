@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Ingresos</h1>

    <a href="{{ route('ingresos.create') }}" class="btn btn-primary mb-3">Nuevo Ingreso</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>N° Boleta</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ingresos as $ingreso)
            <tr>
                <td>{{ $ingreso->numero_boleta }}</td>
                <td>{{ $ingreso->codigo }}</td>
                <td>{{ $ingreso->descripcion }}</td>
                <td>{{ $ingreso->monto }}</td>
                <td>{{ $ingreso->fecha }}</td>
                <td>
                    <a href="{{ route('ingresos.show', $ingreso) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('ingresos.edit', $ingreso) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('ingresos.destroy', $ingreso) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar ingreso?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $ingresos->links() }}
</div>
@endsection
