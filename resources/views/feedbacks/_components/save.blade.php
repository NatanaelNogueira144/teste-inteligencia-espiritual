@if(isset($feedback->id))
    <form method="post" action="{{ route('feedbacks.update', ['feedback' => $feedback->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('feedbacks.store') }}">
        @csrf
@endif
    <div class="form-group mb-3">
        <label>Descrição</label>
        <input 
            class="form-control @error('description') is-invalid @enderror"
            name="description"
            placeholder="Digite a descrição..."
            required
            type="text"
            value="{{ old('description') ?? $feedback->description ?? '' }}"
        >

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="d-flex justify-content-around">
        <input type="submit" class="btn btn-primary btn-md" value="Salvar" />
    </div>
</form>