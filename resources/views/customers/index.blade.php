@extends('components.layout')

@section('content')
    <x-indexHeader title="Alle kunder" name="searchCustomers" link="customers.create" />

    <x-success />

    <table class="table table-sm mt-2">
        <thead>
            <tr>
                <th scope="col" style="width: 7%">@sortablelink('id', '#')</th>
                <th scope="col" style="width: 20%">@sortablelink('mail', 'Email')</th>
                <th scope="col" style="width: 20%">@sortablelink('name', 'Navn')</th>
                <th scope="col" style="width: 20%">@sortablelink('address', 'Adresse')</th>
                <th scope="col" style="width: 15%">@sortablelink('phone', 'Tlf. nummer')</th>
                <th scope="col" style="width: 18%">Yderligere funktioner</th>
            </tr>
        </thead>
        <tbody>
            @if($customers->count() == 0)
                <tr>
                    <td colspan="5">Der er inden Forfattere at vise..</td>
                </tr>
            @endif

            @foreach ($customers as $customer)
                <tr>
                    <th scope="row">{{Str::limit($customer->id, 3, $end='..')}}</th>
                    <td>{{Str::limit($customer->mail, 20, $end='..')}}</td>
                    <td>{{Str::limit($customer->name, 20, $end='..')}}</td>
                    <td>{{Str::limit($customer->address, 20, $end='..')}}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('customers.show',$customer->id) }}">Detaljer</a>

                            <a class="btn btn-primary btn-sm" href="{{ route('customers.edit',$customer->id) }}">Rediger</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">Slet</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$customers->links("pagination::bootstrap-4")}}

@endsection
