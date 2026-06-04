@extends('_layouts.app', ['title' => 'Editar Nível'])

@section('content')
<div class="card rounded">
    <div class="card-header d-flex align-items-center">
        <h5 class="card-title m-0">Editar Nível - {{ $level->name }}</h5>
    </div>

    <div class="card-body">
        <p>Preencha os campos abaixo para editar os dados do nível "{{ $level->name }}".</p>
        @component('levels._components.save', ['level' => $level])
        @endcomponent
    </div>
</div>
@endsection