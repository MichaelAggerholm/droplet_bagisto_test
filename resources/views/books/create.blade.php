@extends('books.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Book</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ISBN:</strong>
                    <input type="text" name="ISBN" class="form-control" placeholder="ISBN">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Author id:</strong>
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
                    <strong>Author id:</strong>
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
                    <strong>Year:</strong>
                    <input type="number" name="year" class="form-control" placeholder="Year">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number" name="price" class="form-control" placeholder="Price">
                </div>
            </div>
{{--            start--}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Warehouses:</strong>
                    @foreach($warehouses as $warehouse)
                        <input type="checkbox" name="checked[]" value="{{ $warehouse->id }}">
                            {{ $warehouse->address }}
                        <br/>
                    @endforeach
                </div>
            </div>
{{--            end--}}
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
