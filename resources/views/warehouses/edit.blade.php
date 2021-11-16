@extends('components.layout')

@section('content')

    <x-pageHeader title="Rediger varehus" link="warehouses.index" />

    <x-errorHandler message="Der opstod problemer med dit input!" />

    <form action="{{ route('warehouses.update',$warehouse->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mt-5">

            <x-form.editInput type="text" title="Navn" name="name" value="{{ $warehouse->name }}" placeholder="Navn" />
            <x-form.editInput type="text" title="Adresse" name="address" value="{{ $warehouse->address }}" placeholder="Adresse" />
            <x-form.editInput type="number" title="Telefon" name="phone" value="{{ $warehouse->phone }}" placeholder="Telefon" />
            <x-form.editInput type="text" title="Website" name="url" value="{{ $warehouse->url }}" placeholder="Website" />

            <x-submitBtn text="Rediger" />
        </div>
    </form>
@endsection
