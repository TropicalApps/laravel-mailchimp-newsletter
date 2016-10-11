{{-- Error messages --}}
@if (count($errors) > 0)
    <div class="alert alert-warning alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Response messages --}}
@if (Session::has('status') && Session::has('response_message'))
    <div class="alert alert-{{ Session::get('status') }} alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <ul>
            {{ Session::get('response_message') }}
        </ul>
    </div>
@endif