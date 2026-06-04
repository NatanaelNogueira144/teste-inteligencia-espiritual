<div>
    <h5 class="card-title">Respostas</h5>
    <p><strong>1 - Discordo Muito | 2 - Discordo | 3 - Neutro | 4 - Concordo | 5 - Concordo Muito</strong></p>
    <table class="table table-bordered table-striped align-middle">
        <thead class="text-center">
            <th class="align-middle">Nota</th>
            <th class="align-middle">Afirmativa</th>
        </thead>
        <tbody>
            @foreach($result->answers as $answer)
                <tr>
                    <td class="align-middle text-center">{{ $answer->note }}</td>
                    <td class="align-middle">{{ $answer->question->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h5 class="card-title">Resultados</h5>

    @foreach($result->feedbacks as $feedback)
        <div class="card card-body mb-3">
            <h5 class="card-title">Resultado {{ $feedback->result_number }}</h5>
            <p>{{ $feedback->description }}</p>
        </div>
    @endforeach

    <div class="card card-body">
        <h5 class="card-title">Resultado Geral</h5>
        <p>O seu nível de QS (inteligência espiritual) é: <strong>{{ $result->level->name }}</strong></p>
        <small>
            Este resultado representa o nível da sua QS, baseado na pesquisa científica do Dr. Djalma Pinho sobre as 
            ideias angulares e no formato CALL DAD.
        </small>
    </div>
</div>