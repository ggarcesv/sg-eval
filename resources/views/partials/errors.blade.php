<div class="alert alert-danger">
        <h6> Oops, it seems something is not quite right: </h6>
        <ul class="error-list">
            @foreach($error->messages as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
</div>