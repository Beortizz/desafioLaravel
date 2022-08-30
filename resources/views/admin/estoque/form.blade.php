<div class="row">
    <div class="form-group col-sm-4">
        <label for="produtos" class="required">Produto </label>
        <select class="form-select form-select-lg d-flex" aria-label="Default select example">
            <option selected>Selecione um Produto</option>
            @foreach($produtos as $produto)
            <option value="{{$produto->nome}}">{{$produto->nome }}</option>
            @endforeach
          </select>
    </div>
    <div class="form-group col-sm-4">
        <label for="quantidade" class="required">Quantidade </label>
        <input type="number" name="quantidade" id="quantidade" class=" form-control" required
            value="{{ old('quantidade', $estoque->quantidade) }}">
    </div>
    <div class="form-group col-sm-4">
        <label for="data" class="required">Data </label>
        <input type="date" name="data" id="data" class="form-control" required
            value="{{ old('data', $estoque->data) }}">
    </div>
</div>