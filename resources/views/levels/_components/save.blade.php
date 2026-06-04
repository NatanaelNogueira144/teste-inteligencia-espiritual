@if(isset($level->id))
    <form method="post" action="{{ route('levels.update', ['level' => $level->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('levels.store') }}">
        @csrf
@endif
    <div class="form-group mb-3">
        <label>Nome</label>
        <input 
            class="form-control @error('name') is-invalid @enderror"
            name="name"
            placeholder="Digite o nome..."
            required
            type="text"
            value="{{ old('name') ?? $level->name ?? '' }}"
        >

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="d-flex justify-content-around">
        <input type="submit" class="btn btn-primary btn-md" value="Salvar" />
    </div>
</form>