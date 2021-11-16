@extends('components.layout')

@section('content')
    <x-pageHeader title="Deltajer om Forfatteren" link="authors.index" />

    <div class="row mt-5 mt-5">
        <x-detailsOutput title="Navn" field="{{ $author->name }}" />
        <x-detailsOutput title="Adresse" field="{{ $author->address }}" />
        <x-detailsOutput title="Telefon" field="{{ $author->phone }}" />
        <x-detailsOutput title="Website" field="{{ $author->url }}" />
    </div>
@endsection
