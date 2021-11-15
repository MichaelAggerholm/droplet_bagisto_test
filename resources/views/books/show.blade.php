@extends('books.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 mt-5 margin-tb headerFlex mt-5">
            <h3>Detaljer om bogen</h3>
            <a class="btn btn-primary btn-sm" href="{{ route('books.index') }}"> Tilbage</a>
        </div>
    </div>
    <hr>
    <div class="row mt-5 mt-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ISBN:</strong>
                {{ $book->ISBN }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Forfatter:</strong>
                {{ $book->author->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Forlægger:</strong>
                {{ $book->publisher->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Årstal:</strong>
                {{ $book->year }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titel:</strong>
                {{ $book->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pris:</strong>
                {{ $book->price }} kr,-
            </div>
        </div>
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
