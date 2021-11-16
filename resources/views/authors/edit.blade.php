@extends('components.layout')

@section('content')

    <x-pageHeader title="Rediger Forfatter" link="authors.index" />

    <x-errorHandler message="Der opstod problemer med dit input!" />

    <form action="{{ route('authors.update',$author->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mt-5">

            <x-form.editInput type="text" title="Navn" name="name" value="{{ $author->name }}" placeholder="Navn" />
            <x-form.editInput type="text" title="Adresse" name="address" value="{{ $author->address }}" placeholder="Adresse" />
            <x-form.editInput type="number" title="Telefon" name="phone" value="{{ $author->phone }}" placeholder="Telefon" />
            <x-form.editInput type="text" title="Website" name="url" value="{{ $author->url }}" placeholder="Website" />

            <x-submitBtn text="Rediger" />
        </div>
    </form>
@endsection
