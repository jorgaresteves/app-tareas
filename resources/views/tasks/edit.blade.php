@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">EDITAR TAREA</div>

            <div class="card-body">
                <form method="POST" action="{{  route('tareas.update', $task->id)  }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    
                    <div class="form-group">
                        <label>Titulo de Tarea</label>
                        <input type="text" name="title" class="form-control" value="{{ $task->title }}" required="">
                    </div>

                    <div class="form-group">
                        <label>Fecha de Entrega</label>
                        <input type="date" name="deadline" class="form-control" value="{{ $task->deadline }}">
                    </div>

                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control" name="description" rows="5"> {{ $task->description }} </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar en la base de datos</button>
                    <a href="{{ route('tareas.index') }}" class="btn btn-outline-dark">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection