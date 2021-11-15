@extends('books.layout')

@section('content')

    <div class="row mt-5">
        <div class="col-lg-12 margin-tb headerFlex">
            <h3>Rediger bog</h3>
            <a class="btn btn-primary btn-sm" href="{{ route('books.index') }}"> Tilbage</a>
        </div>
    </div>
    <hr>
    {{--Error handling--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Der opstod problemer med dit input!<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update',$book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mt-5">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ISBN:</strong>
                    <input type="text" name="ISBN" value="{{ $book->ISBN }}" class="form-control" placeholder="ISBN">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Forfatter:</strong>
                    <select class="form-control" name="author_id">
                        @if ($authors->count())
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}" {{ $selectedAuthor == $author->id ? 'selected="selected"' : '' }}>
                                    {{ $author->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Forlægger:</strong>
                    <select class="form-control" name="publisher_id">
                        @if ($publishers->count())
                            @foreach($publishers as $publisher)
                                <option value="{{ $publisher->id }}" {{ $selectedPublisher == $publisher->id ? 'selected="selected"' : '' }}>
                                    {{ $publisher->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Årstal:</strong>
                    <input type="number" name="year" value="{{ $book->year }}" class="form-control" placeholder="Year">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Titel:</strong>
                    <input type="text" name="title" value="{{ $book->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pris:</strong>
                    <input type="text" name="price" value="{{ $book->price }}" class="form-control" placeholder="Price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Varehuse:</strong>
                    <br>
                    @foreach($warehouses as $warehouse)
                        <input @if($book->warehouses()->where('warehouse_id', $warehouse->id)->exists()) checked @endif type="checkbox" name="checked[]" value="{{ $warehouse->id }}">
                        {{ $warehouse->address }}
                        <br/>
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-sm">Rediger</button>
            </div>
        </div>
    </form>
@endsection
