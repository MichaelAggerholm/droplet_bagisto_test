@extends('components.layout')

@section('content')
    <x-indexHeader title="Alle Forfatterer" name="searchAuthors" link="authors.create" />

    <x-success />

    <table class="table table-sm mt-2">
        <thead>
            <tr>
                <th scope="col" style="width: 7%">@sortablelink('id', '#')</th>
                <th scope="col" style="width: 20%">@sortablelink('name', 'Navn')</th>
                <th scope="col" style="width: 20%">@sortablelink('address', 'Adresse')</th>
                <th scope="col" style="width: 15%">@sortablelink('phone', 'Tlf. nummer')</th>
                <th scope="col" style="width: 20%">@sortablelink('url', 'Hjemmeside')</th>
                <th scope="col" style="width: 18%">Yderligere funktioner</th>
            </tr>
        </thead>
        <tbody>
            @if($authors->count() == 0)
                <tr>
                    <td colspan="5">Der er inden Forfatterer at vise..</td>
                </tr>
            @endif

            @foreach ($authors as $author)
                <tr>
                    <th scope="row">{{Str::limit($author->id, 3, $end='..')}}</th>
                    <td>{{Str::limit($author->name, 20, $end='..')}}</td>
                    <td>{{Str::limit($author->address, 20, $end='..')}}</td>
                    <td>{{ $author->phone }}</td>
                    <td>{{Str::limit($author->url, 20, $end='..')}}</td>
                    <td>
                        <form action="{{ route('authors.destroy',$author->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('authors.show',$author->id) }}">Detaljer</a>

                            <a class="btn btn-primary btn-sm" href="{{ route('authors.edit',$author->id) }}">Rediger</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">Slet</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$authors->links("pagination::bootstrap-4")}}

@endsection
