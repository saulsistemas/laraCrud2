
@extends('layouts.plantilla')
@section('contenido')
    <h1>Listado de Categorías</h1>
    <div class="d-md-flex justify-content-md-end">
        <form action="{{ route('categorias.index') }}" method="GET">
            <div class="btn-group">
                <input type="text" name="busqueda" class="form-control">
                <input type="submit" value="enviar" class="btn btn-primary">
            </div>
        </form>
    </div>    
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
                        <a class="btn btn-primary" href="{{ route('categorias.show', $categoria) }}">+</a>
                        <a class="btn btn-warning" href="{{ route('categorias.edit', $categoria) }}">Editar</a>
                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Eliminar" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4"> {{$categorias->appends(['busqueda'=>$busqueda])}} </td>
            </tr>
        </tfoot>        
    </table>
@endsection