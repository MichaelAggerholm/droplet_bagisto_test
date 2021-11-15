@extends('components.layout')

@section('content')
    <x-pageHeader title="Opret bog" link="books.index" />

    <x-errorHandler message="Der opstod problemer med dit input!" />

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="row mt-5">

            <x-form.input title="ISBN" type="text" name="ISBN" placeholder="ISBN" />

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

            <x-form.input title="Årstal" type="number" name="year" placeholder="Year" />
            <x-form.input title="Titel" type="text" name="title" placeholder="Title" />
            <x-form.input title="Pris" type="number" name="price" placeholder="Price" />

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Varehuse:</strong>
                    <br>
                    @foreach($warehouses as $warehouse)
                        <input type="checkbox" name="checked[]" value="{{ $warehouse->id }}">
                            {{ $warehouse->address }}
                        <br/>
                    @endforeach
                </div>
            </div>

            <x-submitBtn text="Opret" />
        </div>

    </form>
@endsection
