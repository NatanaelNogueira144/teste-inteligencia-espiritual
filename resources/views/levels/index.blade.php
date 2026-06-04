@extends('_layouts.app', ['title' => 'Lista de Níveis'])

@section('content')
<div class="card rounded">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title m-0">Lista de Níveis</h5>
    </div>

    <div class="card-body">
        <form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <input 
                            class="form-control"
                            name="name[like]"
                            placeholder="Buscar por..."
                            type="search"
                            value="{{ isset($request['name']['like']) ? $request['name']['like'] : '' }}"
                        >

                        <button type="submit" class="btn btn-primary btn-md">
                            <i class="icofont-search-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>

        @component('_components.paginator', ['paginator' => $levels])
        @endcomponent

        @component('_components.paginator-results', ['paginator' => $levels])
        @endcomponent

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <th class="align-middle">Descrição</th>
                    <th class="align-middle">Nota Mínima</th>
                    <th class="align-middle">Nota Máxima</th>
                    <th class="align-middle">Ações</th>
                </thead>
                <tbody>
                    @foreach($levels as $level)
                        <tr>
                            <td class="align-middle">{{ $level->name }}</td>
                            <td class="align-middle">{{ $level->min_note }}</td>
                            <td class="align-middle">{{ $level->max_note }}</td>
                            <td class="align-middle">
                                <a 
                                    href="{{ route('levels.edit', ['level' => $level->id]) }}" 
                                    class="btn btn-primary rounded-circle"
                                >
                                    <i class="icofont-edit" style="font-size: 16px;"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection