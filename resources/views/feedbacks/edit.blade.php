@extends('_layouts.app', ['title' => 'Editar Feedback'])

@section('content')
<div class="card rounded">
    <div class="card-header d-flex align-items-center">
        <h5 class="card-title m-0">Editar Feedback</h5>
    </div>

    <div class="card-body">
        <p>Preencha os campos abaixo para editar os dados do feedback.</p>
        @component('feedbacks._components.save', ['feedback' => $feedback])
        @endcomponent
    </div>
</div>
@endsection