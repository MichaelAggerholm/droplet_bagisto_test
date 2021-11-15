@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> {{ $message }}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
