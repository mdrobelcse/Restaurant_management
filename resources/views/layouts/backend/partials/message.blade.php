@if (Session::has('success'))


    <div class="col-md-12 text-center">
        <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
        </div>
    </div>


@endif



@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
        </button>
        <span>

        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach

    </div>

@endif