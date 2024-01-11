    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Modifier une dalle</h1>

                <form action="{{ route('dalles.update') }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="numero">Numéro</label>
                        <input type="number" class="form-control" id="numero" name="numero" value="{{ $dalle->numero }}" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type" name="type" value="{{ $dalle->type }}" required>
                    </div>

                    <div class="form-group">
                        <label for="epaisseur">Epaisseur</label>
                        <input type="number" step="0.01" class="form-control" id="epaisseur" name="epaisseur" value="{{ $dalle->epaisseur }}" required>
                    </div>

                    <div class="form-group">
                        <label for="longueur">Longueur</label>
                        <input type="number" step="0.01" class="form-control" id="longueur" name="longueur" value="{{ $dalle->longueur }}" required>
                    </div>

                    <div class="form-group">
                        <label for="largeur">Largeur</label>
                        <input type="number" step="0.01" class="form-control" id="largeur" name="largeur" value="{{ $dalle->largeur }}" required>
                    </div>

                    <div class="form-group">
                        <label for="hourdi">Hourdi</label>
                        <input type="checkbox" id="hourdi" name="hourdi" {{ $dalle->hourdi ? 'checked' : '' }}>
                    </div>

                    <div class="form-group">
                        <label for="enduitSousFace">Enduit sous face</label>
                        <input type="checkbox" id="enduitSousFace" name="enduitSousFace" {{ $dalle->enduitSousFace ? 'checked' : '' }}>
                    </div>

                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
