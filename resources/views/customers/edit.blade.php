@extends('components.layout')

@section('content')

    <x-pageHeader title="Rediger kunde" link="customers.index" />

    <x-errorHandler message="Der opstod problemer med dit input!" />

    <form action="{{ route('customers.update',$customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mt-5">

            <x-form.editInput type="email" title="Email" name="mail" value="{{ $customer->mail }}" placeholder="Email" />
            <x-form.editInput type="text" title="Navn" name="name" value="{{ $customer->name }}" placeholder="Navn" />
            <x-form.editInput type="text" title="Adresse" name="address" value="{{ $customer->address }}" placeholder="Adresse" />
            <x-form.editInput type="number" title="Telefon" name="phone" value="{{ $customer->phone }}" placeholder="Telefon" />

            <x-submitBtn text="Rediger" />
        </div>
    </form>
@endsection
