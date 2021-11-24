<table class="table table-hover table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Owner</th>
        <th>Controls</th>
        <th>Created_at</th>
    </tr>
    </thead>
    <tbody>
    @foreach(\App\Category::with("user")->get() as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->user->name }}</td>
            <td>
                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                <form action="{{ route('category.destroy', $category->id) }}" class="d-inline-block" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-outline-danger btn-sm"
                            onclick="return confirm('Are U sure to delete this category?')">Delete
                    </button>
                </form>
            </td>
            <td>
                <small>
                    <i class="feather-calendar"></i>
                    {{ $category->created_at->format('d-m-Y') }}
                </small>
                <br>
                <small>
                    <i class="feather-clock"></i>
                    {{ $category->created_at->format('h:i A') }}
                </small>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
