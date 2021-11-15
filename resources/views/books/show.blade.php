@extends('components.layout')

@section('content')
    <x-pageHeader title="Deltajer om bogen" link="books.index" />

    <div class="row mt-5 mt-5">
        <x-detailsOutput title="ISBN" field="{{ $book->ISBN }}" />
        <x-detailsOutput title="Forfatter" field="{{ $book->author->name }}" />
        <x-detailsOutput title="Forlægger" field="{{ $book->publisher->name }}" />
        <x-detailsOutput title="Årstal" field="{{ $book->year }}" />
        <x-detailsOutput title="Titel" field="{{ $book->title }}" />
        <x-detailsOutput title="Pris" field="{{ $book->price }} kr,-" />

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Varehuse:</strong>
                <br>
                @foreach($warehouses as $warehouse)
                    @if($book->warehouses()->where('warehouse_id', $warehouse->id)->exists())
                        <p>{{ $warehouse->address }}</p>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
