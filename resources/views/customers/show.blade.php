@extends('components.layout')

@section('content')
    <x-pageHeader title="Deltajer om kunden" link="customers.index" />

    <div class="row mt-5 mt-5">
        <x-detailsOutput title="Email" field="{{ $customer->mail }}" />
        <x-detailsOutput title="Navn" field="{{ $customer->name }}" />
        <x-detailsOutput title="Adresse" field="{{ $customer->address }}" />
        <x-detailsOutput title="Telefon" field="{{ $customer->phone }}" />
    </div>
@endsection
