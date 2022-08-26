<div class="col-md-10 offset-md-1 col-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title title-form">{{ $title ?? null }} </h3>
        </div>
        <div class="card-body">
            <form id="form-adicionar" action="{{ $url ?? '/' }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                {{ $form ?? null }}
            </form>
        </div>
        <div class="card-footer">
            <button type="submit" form="form-adicionar" class="btn btn-primary float-right">{{$button_name ?? 'Salvar Alterações'}}</button>
            {{ $back ?? null }}
        </div>
    </div>
</div>

@push('scripts')
    @if (isset($load) && $load)
        <script>
            $('#form-adicionar').on('submit', function (event) {
                Swal.fire({
                    title: 'Atualizando...',
                    allowOutsideClick: false,
                    width: 400,
                    showCancelButton: false,
                    showConfirmButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                });
            });
        </script>
    @endif
@endpush
