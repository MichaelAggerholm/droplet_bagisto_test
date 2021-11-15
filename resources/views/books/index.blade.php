@extends('components.layout')

@section('content')
    <x-indexHeader title="Alle bøger" name="searchBooks" link="books.create" />

    <x-success />

    <table class="table table-sm mt-2">
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
                    <td colspan="5">Der er inden bøger at vise..</td>
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
