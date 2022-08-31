<div class="row">
    <div class="form-group col-sm-6">
        <label for="nome" class="required">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" required autofocus
            value="{{ old('nome', $produto->nome) }}">
    </div>
    <div class="form-group col-sm-6">
        <label for="preco" class="required">Preço</label>
        <input type="float" name="preco" id="preco" class="form-control" required
            value="{{ old('preco', $produto->preco) }}">
    </div>
    <div class="form-group col-sm-6">
        <label for="sabor" class="required">Sabor</label>
        <input type="text" name="sabor" id="sabor" class="form-control" required
            value="{{ old('sabor', $produto->sabor) }}">
    </div>
    <div class="form-group col-sm-6">
        <label for="descricao" class="required">Descrição</label>
        <input type="text" name="descricao" id="descricao" class="form-control" required
            value="{{ old('descricao', $produto->descricao) }}">
    </div>
    <div class="row">
        <div class="form-group col-sm-12 d-flex justify-content-center mt-2 pl-5">
            <label for="path" class="required">Foto</label>
            <input type="file" class="pl-3" name="path" id="path" required> 
        </div>
    </div>
</div>