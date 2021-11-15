@extends('components.layout')

@section('content')
    <x-pageHeader title="Deltajer om forlæggeren" link="publishers.index" />

    <div class="row mt-5 mt-5">
        <x-detailsOutput title="Navn" field="{{ $publisher->name }}" />
        <x-detailsOutput title="Adresse" field="{{ $publisher->address }}" />
        <x-detailsOutput title="Telefon" field="{{ $publisher->phone }}" />
        <x-detailsOutput title="Website" field="{{ $publisher->url }}" />
    </div>
@endsection
