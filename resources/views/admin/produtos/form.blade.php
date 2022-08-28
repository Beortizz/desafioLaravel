<div class="row">
    <div class="form-group col-sm-6">
        <label for="produtos" class="required">Produto </label>
        <input type="text" name="produtos" id="produtos" class="form-control" required autofocus
            value="{{ old('produtos', $produtos->produtos) }}">
    </div>
    <div class="form-group col-sm-6">
        <label for="quantidade" class="required">Quantidade </label>
        <input type="number" name="quantidade" id="quantidade" class=" form-control" required
            value="{{ old('quantidade', $produtos->quantidade) }}">
    </div>
    <div class="form-group col-sm-6">
        <label for="data" class="required">Data </label>
        <input type="date" name="data" id="data" class="form-control" required
            value="{{ old('data', $produtos->data) }}">
    </div>
</div>