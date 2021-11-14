@extends('books.layout')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h3>Alle bøger</h3>
            </div>
            <div class="float-right searchAndCreate">
                <form method="GET" action="#" class="form-inline">
                    <input type="search"
                           name="search"
                           placeholder="Find noget..."
                           aria-label="Search"
                           class="form-control form-control-sm mr-sm-2"
                           value="{{ request('search') }}" />
                    <button class="btn btn-success btn-sm mr-sm-2" type="submit">Søg</button>

                    <a class="btn btn-success btn-sm" href="{{ route('books.create') }}">Opret</a>
                </form>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ISBN</th>
                <th scope="col">Forfatter</th>
                <th scope="col">Forlægger</th>
                <th scope="col">Årstal</th>
                <th scope="col">Titel</th>
                <th scope="col">Pris</th>
                <th scope="col">Yderligere funktioner</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <th scope="row">{{ $book->id }}</th>
                    <td>{{ $book->ISBN }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->publisher->name }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->price }} kr,-</td>
                    <td>
                        <form action="{{ route('books.destroy',$book->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('books.show',$book->id) }}">Detaljer</a>

                            <a class="btn btn-primary btn-sm" href="{{ route('books.edit',$book->id) }}">Rediger</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">Slet</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$books->links("pagination::bootstrap-4")}}

@endsection
