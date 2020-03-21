@if (Session::has('success'))

    <div class="alert alert-success " role="alert" style="margin: 10px 20px 20px 20px; padding-left: 50px; padding-right: 30px">
        <strong>Success: </strong> {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif

@if (Session::has('unsuccessful'))

    <div class="alert alert-danger" role="alert" style="margin: 10px 20px 20px 20px; padding-left: 50px; padding-right: 30px">
        <strong>Unsuccessful: </strong> {{ Session::get('unsuccessful') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert" style="margin: 10px 20px 20px 20px; padding-left: 50px; padding-right: 30px">
        <strong>Errors: </strong>
        <ul style="list-style: none">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif
