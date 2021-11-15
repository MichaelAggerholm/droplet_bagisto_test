@extends('components.layout')

@section('content')

    <x-pageHeader title="Rediger forlægger" link="publishers.index" />

    <x-errorHandler message="Der opstod problemer med dit input!" />

    <form action="{{ route('publishers.update',$publisher->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mt-5">

            <x-form.editInput type="text" title="Navn" name="name" value="{{ $publisher->name }}" placeholder="Navn" />
            <x-form.editInput type="text" title="Adresse" name="address" value="{{ $publisher->address }}" placeholder="Adresse" />
            <x-form.editInput type="number" title="Telefon" name="phone" value="{{ $publisher->phone }}" placeholder="Telefon" />
            <x-form.editInput type="text" title="Website" name="url" value="{{ $publisher->url }}" placeholder="Website" />

            <x-submitBtn text="Rediger" />
        </div>
    </form>
@endsection
