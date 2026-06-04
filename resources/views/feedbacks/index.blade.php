@extends('_layouts.app', ['title' => 'Lista de Feedbacks'])

@section('content')
<div class="card rounded">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title m-0">Lista de Feedbacks</h5>
    </div>

    <div class="card-body">
        <form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" name="resultNumber[eq]">
                        <option value="">Todos os Resultados</option>
                        @for($i = 1; $i <= 4; $i++)
                            <option 
                                value="{{ $i }}" 
                                {{ isset($request['resultNumber']['eq']) && $request['resultNumber']['eq'] == $i ? 'selected' : '' }}
                            >
                                Resultado {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <input 
                            class="form-control"
                            name="description[like]"
                            placeholder="Buscar por..."
                            type="search"
                            value="{{ isset($request['description']['like']) ? $request['description']['like'] : '' }}"
                        >

                        <button type="submit" class="btn btn-primary btn-md">
                            <i class="icofont-search-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>

        @component('_components.paginator', ['paginator' => $feedbacks])
        @endcomponent

        @component('_components.paginator-results', ['paginator' => $feedbacks])
        @endcomponent

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <th class="align-middle">Descrição</th>
                    <th class="align-middle">Resultado</th>
                    <th class="align-middle">Nota Mínima</th>
                    <th class="align-middle">Nota Máxima</th>
                    <th class="align-middle">Ações</th>
                </thead>
                <tbody>
                    @foreach($feedbacks as $feedback)
                        <tr>
                            <td class="align-middle">{{ $feedback->short_description }}</td>
                            <td class="align-middle">Resultado {{ $feedback->result_number }}</td>
                            <td class="align-middle">{{ $feedback->min_note }}</td>
                            <td class="align-middle">{{ $feedback->max_note }}</td>
                            <td class="align-middle">
                                <a 
                                    href="{{ route('feedbacks.edit', ['feedback' => $feedback->id]) }}" 
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