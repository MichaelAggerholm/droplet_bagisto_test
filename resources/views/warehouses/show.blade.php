@extends('components.layout')

@section('content')
    <x-pageHeader title="Deltajer om varehuset" link="warehouses.index" />

    <div class="row mt-5 mt-5">
        <x-detailsOutput title="Navn" field="{{ $warehouse->name }}" />
        <x-detailsOutput title="Adresse" field="{{ $warehouse->address }}" />
        <x-detailsOutput title="Telefon" field="{{ $warehouse->phone }}" />
        <x-detailsOutput title="Website" field="{{ $warehouse->url }}" />
    </div>
@endsection
