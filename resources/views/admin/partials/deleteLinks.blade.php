<form action="{{ route($route, $id) }}" method="post">
    @csrf
    @method('delete')

    <button class="ms-3" type="submit">Delete</button>
</form>