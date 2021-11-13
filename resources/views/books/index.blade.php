@extends('books.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Book CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('books.create') }}"> Create New book</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>ISBN</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Year</th>
            <th>Title</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->ISBN }}</td>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->publisher->name }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->price }} kr,-</td>
                <td>
                    <form action="{{ route('books.destroy',$book->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{$books->links("pagination::bootstrap-4")}}

@endsection
