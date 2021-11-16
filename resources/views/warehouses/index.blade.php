@extends('components.layout')

@section('content')
    <x-indexHeader title="Alle varehuse" name="searchWarehouses" link="warehouses.create" />

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
            @if($warehouses->count() == 0)
                <tr>
                    <td colspan="5">Der er inden varehuse at vise..</td>
                </tr>
            @endif

            @foreach ($warehouses as $warehouse)
                <tr>
                    <th scope="row">{{Str::limit($warehouse->id, 3, $end='..')}}</th>
                    <td>{{Str::limit($warehouse->name, 20, $end='..')}}</td>
                    <td>{{Str::limit($warehouse->address, 20, $end='..')}}</td>
                    <td>{{ $warehouse->phone }}</td>
                    <td>{{Str::limit($warehouse->url, 20, $end='..')}}</td>
                    <td>
                        <form action="{{ route('warehouses.destroy',$warehouse->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('warehouses.show',$warehouse->id) }}">Detaljer</a>

                            <a class="btn btn-primary btn-sm" href="{{ route('warehouses.edit',$warehouse->id) }}">Rediger</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">Slet</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$warehouses->links("pagination::bootstrap-4")}}

@endsection
