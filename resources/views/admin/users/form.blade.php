<div class="row">
    <div class="form-group col-sm-6">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" class="form-control" required autofocus
            value="{{ old('name',$user->name) }}">
    </div>
    <div class="form-group col-sm-6">
        <label for="email" class="required">E-mail </label>
        <input type="email" name="email" id="email" class="form-control" required
            value="{{ old('email',$user->email) }}">
    </div>
    <div class="form-group col-sm-6">
        <label for="matricula" class="required">Matricula</label>
        <input type="number" name="matricula" id="matricula" class="form-control" required
            value="{{ old('matricula',$user->matricula) }}">
    </div>
    <div class="form-group col-sm-6">
        <label for="matricula" class="required">Fidelidade</label>
        <input type="number" name="fidelidade" id="fidelidade" class="form-control" required
            value="{{ old('fidelidade',$user->fidelidade) }}">
    </div>
</div>