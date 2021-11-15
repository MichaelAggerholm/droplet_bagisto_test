@extends('components.layout')

@section('content')

    <x-pageHeader title="Rediger bog" link="books.index" />

    <x-errorHandler message="Der opstod problemer med dit input!" />

    <form action="{{ route('books.update',$book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mt-5">

            <x-form.editInput type="text" title="ISBN" name="ISBN" value="{{ $book->ISBN }}" placeholder="ISBN" />

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

            <x-form.editInput type="number" title="Årstal" name="year" value="{{ $book->year }}" placeholder="Year" />
            <x-form.editInput type="text" title="Titel" name="title" value="{{ $book->title }}" placeholder="Title" />
            <x-form.editInput type="text" title="Pris" name="price" value="{{ $book->price }}" placeholder="Price" />

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

            <x-submitBtn text="Rediger" />
        </div>
    </form>
@endsection
