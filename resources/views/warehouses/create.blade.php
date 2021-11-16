@extends('components.layout')

@section('content')
    <x-pageHeader title="Opret varehus" link="warehouses.index" />

    <x-errorHandler message="Der opstod problemer med dit input!" />

    <form action="{{ route('warehouses.store') }}" method="POST">
        @csrf

        <div class="row mt-5">

            <x-form.input title="Navn" type="text" name="name" placeholder="Navn" />
            <x-form.input title="Adresse" type="text" name="address" placeholder="Adresse" />
            <x-form.input title="Telefon" type="number" name="phone" placeholder="Telefon" />
            <x-form.input title="Website" type="text" name="url" placeholder="Website" />

            <x-submitBtn text="Opret" />
        </div>

    </form>
@endsection
