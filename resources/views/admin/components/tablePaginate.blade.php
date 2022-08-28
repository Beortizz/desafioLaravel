@if ($body != '' || !($createFirst ?? true))
<div class="card">
    @if (isset($create) || isset($titulo))
    <div class="card-header card-outline cor-backend">
        <h3 class="float-left m-0 table-title"><i class="{{ $icon ?? null }} mr-2"></i>{{ $titulo ?? null }}</h3>
    </div>
    @endif
    <div class="card-body table-responsive table-sm">
        {{ $navTable ?? null }}
        <table id="example" class="w-100 table table-hover dataTableSimple table-striped">
            <thead class="">
                <tr>
                    {{ $head ?? null }}
                </tr>
            </thead>
            <tbody>
                {{ $body ?? null }}
            </tbody>
            <tfoot>
                {{ $footer ?? null }}
            </tfoot>
        </table>
        <div class="d-flex justify-content-sm-end mt-4">
            {{ $paginate ?? null }}
        </div>
    </div>
</div>
@else
<div class="text-center" style="color: #949699">
    <i class="fas fa-exclamation-circle" style="font-size: 10em"></i>
    <p class="mb-4 h2">Nenhum item encontrado!</p>
    @if (isset($create))
    <a href="{{ $create }}">
        <button type="button" class="btn btn-primary">
            <b><i class="fas fa-plus-circle"></i> Adicionar novo item</b>
        </button>
    </a>
    @endif
    @if(count(request()->all()) > 0)
    <a href="{{ route(Route::getCurrentRoute()->getName()) }}">
        <button type="button" class="btn btn-danger">
            <b><i class="fas fa-times-circle"></i> Limpar filtros</b>
        </button>
    </a>
    @endif
</div>
@endif

@push('scripts')
<script>
$("#search").change(function() {
    $("#form-search").submit();
});
$("#search").on('search', function() {
    $("#form-search").submit();
});
</script>
@endpush