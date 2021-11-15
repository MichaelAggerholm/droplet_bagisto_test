@extends('components.layout')

@section('content')
    <x-indexHeader title="Alle Forlæggerer" name="searchPublishers" link="publishers.create" />

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
            @if($publishers->count() == 0)
                <tr>
                    <td colspan="5">Der er inden forlæggerer at vise..</td>
                </tr>
            @endif

            @foreach ($publishers as $publisher)
                <tr>
                    <th scope="row">{{Str::limit($publisher->id, 3, $end='..')}}</th>
                    <td>{{Str::limit($publisher->name, 20, $end='..')}}</td>
                    <td>{{Str::limit($publisher->address, 20, $end='..')}}</td>
                    <td>{{ $publisher->phone }}</td>
                    <td>{{Str::limit($publisher->url, 20, $end='..')}}</td>
                    <td>
                        <form action="{{ route('publishers.destroy',$publisher->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('publishers.show',$publisher->id) }}">Detaljer</a>

                            <a class="btn btn-primary btn-sm" href="{{ route('publishers.edit',$publisher->id) }}">Rediger</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">Slet</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$publishers->links("pagination::bootstrap-4")}}

@endsection
