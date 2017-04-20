@if(isset($errors))
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="{{ route('books.store') }}" method="POST">
    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
    <input type="text" name="title" value="">
    <input type="text" name="author" value="">
    <input type="submit" value="Save">
</form>