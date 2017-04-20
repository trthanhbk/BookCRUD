<!DOCTYPE html>
<html>
<head>
    <title>Book Index</title>
</head>
<body>
    <h1>Book List</h1>
    <div><a href="{{ route('books.create') }}">Create</a></div>
    <ul>
        @foreach($items as $item)
            <li>
                {{ $item->title }} - {{ $item->author }}
                <a href="{{ route('books.show', [$item->id]) }}">show</a>
                <a href="{{ route('books.edit', [$item->id]) }}">edit</a>
                <form action="{{ route('books.destroy', [$item->id]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="delete">
                </form>
            </li>
        @endforeach
    </ul>
    <div>{{ $items->links() }}</div>
</body>
</html>