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
                <th scope="col" style="width: 5%">@sortablelink('id', '#')</th>
                <th scope="col" style="width: 15%">@sortablelink('ISBN', 'ISBN')</th>
                <th scope="col" style="width: 18%">@sortablelink('author_id', 'Forfatter')</th>
                <th scope="col" style="width: 18%">@sortablelink('publisher_id', 'Forlægger')</th>
                <th scope="col" style="width: 4%">@sortablelink('year', 'Årstal')</th>
                <th scope="col" style="width: 14%">@sortablelink('title', 'Titel')</th>
                <th scope="col" style="width: 8%">@sortablelink('price', 'Pris')</th>
                <th scope="col" style="width: 18%">Yderligere funktioner</th>
            </tr>
        </thead>
        <tbody>
            @if($books->count() == 0)
                <tr>
                    <td colspan="5">No products to display.</td>
                </tr>
            @endif

            @foreach ($books as $book)
                <tr>
                    <th scope="row">{{Str::limit($book->id, 3, $end='..')}}</th>
                    <td>{{Str::limit($book->ISBN, 10, $end='..')}}</td>
                    <td>{{Str::limit($book->author->name, 20, $end='..')}}</td>
                    <td>{{Str::limit($book->publisher->name, 20, $end='..')}}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{Str::limit($book->title, 13, $end='..')}}</td>
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
