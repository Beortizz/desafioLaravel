@extends('layouts.master')

@section('content')

@component('admin.components.create')
@slot('title', 'Cadastrar produtos')
@slot('url', route('produtos.store'))
@slot('form')
@include('admin.produtos.form')
@endslot
@slot('back')
@can('create', $produto)
@slot('submitButton')
<button type="submit" form="form-adicionar"
class="btn btn-dark float-right">{{$button_name ?? 'Cadastrar'}}</button>
@endslot
@endcan
<a href="{{ route('produtos.index') }}" class="btn btn-dark float-left"><svg xmlns="http://www.w3.org/2000/svg"
        width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
            d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
    </svg>Voltar</a>
@endslot
@endcomponent
@endsection

