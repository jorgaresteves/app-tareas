@if(Session::has('info'))
<div class="alert alert-succes alert-dismissible fade show" role="alert">
<strong>¡Muy bien!</strong> {{ Session::get ('info') }}

<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif


@if(Session::has('alert'))
<div class="alert alert-succes alert-dismissible fade show" role="alert">
<strong>¡Correcto!</strong> {{ Session::get ('info') }}

<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif

@if(Session::has('exito'))
<div class="alert alert-succes alert-dismissible fade show" role="alert">
<strong>Éxito</strong> {{ Session::get ('info') }}

<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif