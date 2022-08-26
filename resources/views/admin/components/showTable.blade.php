<table class="table table-sm table-striped table-bordered">
    <tbody>
        @foreach ($fields as $field => $value)
        <tr>
            <td width="20%"><b>{{ $field }}</b></td>
            <td>{!! $value !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>