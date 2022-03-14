<form action="{{ route($route, $id) }}" method="post">
    @csrf
    @method('delete')

    <button type="submit">Delete</button>
</form>