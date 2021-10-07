@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">MIS TAREAS</div>

                <div class="card-body">
                    <a href="{{  route('tareas.create')  }}" class="btn btn-primary mb-3">Nueva tarea</a>
                </div>
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Título</th>
                      <th scope="col">Fecha de entrega</th>
                      <th scope="col">Descripción</th>
                      <th scope="col">Estado</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tasks as $task)
                    <tr>
                      <th scope="row">{{ $task->id }}</th>
                      <td>{{ $task->title }}</td>
                      <td>{{ $task->deadline }}</td>
                      <td>{{ $task->description }}</td>
                      <td>@if($task->is_complete == false)
                      <span class="badge badge-warning">Pendiente</span>
                      @else
                      <span class="badge badge-warning">Completada</span>
                      @endif
                      </td>
                      <td>@if($task->is_complete == false)
                      <a href="{{ route('tareas.status', $task->id) }}" class="btn btn-outline-success btn-sm">Completar</a>
                      @endif
                      <a href="{{ route('tareas.edit', $task->id) }}" class="btn btn-outline-info btn-sm">Editar</a>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection