@extends('_layouts.app', ['title' => 'Teste'])

@section('content')
<div class="card rounded">
    <form action="{{ route('form.submit') }}" method="post">
        @csrf
        <div class="card-body">
            <h5 class="card-title">Teste de Inteligência Espiritual</h5>

            <p>
                Responda sinceramente a cada uma das afirmações abaixo, colocando um valor de 1 à 5 no campo 
                correspondente à afirmação, sendo:
            </p>
            <p><strong>1 - Discordo Muito | 2 - Discordo | 3 - Neutro | 4 - Concordo | 5 - Concordo Muito</strong></p>
            <p>Quando terminar de avaliar todas as afirmações, clique em "Enviar".</p>

            @error('answers')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <table class="table table-bordered table-striped align-middle">
                <thead class="text-center">
                    <th class="align-middle">Nota</th>
                    <th class="align-middle">Afirmativa</th>
                </thead>
                <tbody>
                    @foreach($questions as $question)
                        <tr>
                            <td class="align-middle text-center">
                                <div class="form-group">
                                    <input 
                                        class="form-control @error('answers.' . $question->id) is-invalid @enderror"
                                        max="5"
                                        min="1"
                                        name="answers[{{ $question->id }}]"
                                        placeholder="Nota..."
                                        step="1"
                                        type="number"
                                        value="{{ old('answers.' . $question->id) }}"
                                    />
                                    @error('answers.' . $question->id)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                            <td class="align-middle">{{ $question->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer d-block text-center brb-15">
            <input type="submit" class="btn btn-primary btn-md" value="Enviar">
        </div>
    </form>
</div>
@endsection