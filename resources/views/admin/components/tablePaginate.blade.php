@if ($body != '' || !($createFirst ?? true))
<div class="card">
    @if (isset($create) || isset($titulo))
    {{ $navTable ?? null }}
    @endif
    <div class="card-body table-responsive table-sm">
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
            <b><i class="bi bi-plus"></i> Adicionar novo item</b>
        </button>
    </a>
    @endif
</div>
@endif
