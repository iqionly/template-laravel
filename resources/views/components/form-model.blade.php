<form action="{{ $action }}" method="post" name="{{ $id }}" id="{{ $id }}" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col">
            <h6>{{ ucwords($header) }} Settings:</h6>
            <p class="text-muted"><small>{{ $description }}</small></p>
        </div>
    </div>
    {{ $slot }}
    <div class="row">
        <div class="col" style="height: 47px;">
            <button type="button" class="reset btn btn-success mt-2">Reset To Default</button>
        </div>
        <div class="col text-end" style="height: 47px;">
            <button type="submit" class="submit btn btn-danger mt-2 {{ !$hideSubmit ?: 'd-none' }}">Save</button>
        </div>
    </div>
</form>
{{-- @once --}}
@push('component-scripts')
    <script>
        (function() {
            let formid = '{{ $id }}';
            $('#' + formid).on('change', 'input, select, textarea', function() {
                //$('#' + formid + ' .reset').removeClass('d-none')
                $('#' + formid + ' .submit').removeClass('d-none')
            })
        })(jQuery)
    </script>
@endpush
{{-- @endonce --}}