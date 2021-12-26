
@extends('layouts.plantilla')
@section('contenido')
    <h1>Listado de Categorías</h1>
    <hr>
    <div>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary">Agregar</a>
    </div>
    <table class="table">
        <thead>
            <td>ID</td>
            <td>CODIGO</td>
            <td>NOMBRE</td>
            <td>CREADO</td>
            <td>opciones</td>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{$categoria->id}}</td>
                    <td>{{$categoria->codigo}}</td>
                    <td>{{$categoria->nombre}}</td>
                    <td>{{$categoria->created_at}}</td>
                    <td class="btn-group">
                        <a class="btn btn-primary" href="{{ route('categorias.show', $categoria->id) }}">+</a>
                        <a class="btn btn-warning" href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
                        <form action="{{ route('categorias.destroy', $categoria->id) }}">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Eliminar" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection