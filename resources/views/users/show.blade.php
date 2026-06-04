@extends('_layouts.app', ['title' => $user->name])

@section('content')
<div class="card rounded">
    <div class="card-body">
        <h5 class="card-title">Resultado do Teste de {{ $user->name }}</h5>

        @if($hasTestDone) 
            @component('_components.test-results', ['result' => $result])
            @endcomponent
        @else
        <div class="alert alert-info mb-3" role="alert">
            O(A) {{ $user->name }} ainda não respondeu ao teste de Inteligência Espiritual!
        </div>
        @endif
    </div>
</div>
@endsection