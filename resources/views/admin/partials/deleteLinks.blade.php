<form action="{{ route($route, $id) }}" method="post">
    @csrf
    @method('delete')

    <button class="btn btn-link text-danger p-0" type="submit"><i class="fa-solid fa-trash-can" title="delete"></i></button>
</form>