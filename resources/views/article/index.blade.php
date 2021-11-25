@extends("layouts.app")
@section("title") Article Lists @endsection

@section("content")

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-list"></i>
                        Article Lists
                    </h4>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <a href="{{ route("article.create") }}" class="btn btn-lg btn-outline-primary"><i class="feather-plus-circle mr-1"></i>Create Article</a>
                        </div>
                        @isset(request()->search)
                            <a href="{{ route("article.index") }}" class="btn btn-lg btn-outline-dark"><i class="feather-list mr-1"></i>All Articles</a>
                            <h5 class="font-weight-bold">Search by " {{ request()->search }} "</h5>
                        @endisset
                        <form action="{{ route("article.index") }}" method="get">
                            <div class="form-inline">
                                <input type="text" name="search" id="search" placeholder="Search Article" class="form-control form-control-lg mr-2" value="{{ request()->search }}">
                                <button class="btn btn-primary btn-lg">
                                    <i class="feather-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <table class="table table-hover table-bordered mt-3">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Article</th>
                            <th>Category</th>
                            <th>Owner</th>
                            <th>Controls</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($articles as $article)

                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>
                                    <span class="font-weight-bold">{{ \Illuminate\Support\Str::words($article->title, 8) }}</span>
                                    <br>
                                    <span class="text-black-50">{{ \Illuminate\Support\Str::words($article->description, 10) }}</span>
                                </td>
                                <td>{{ $article->category->title }}</td>
                                <td>{{ $article->user->name }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('article.show', $article->id) }}" class="btn btn-outline-success btn-sm">Show</a>
                                    <a href="{{ route('article.edit', $article->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                    <form action="{{ route('article.destroy', $article->id) }}" class="d-inline-block" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Are U sure to delete this article?')">Delete
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <small>
                                        <i class="feather-calendar"></i>
                                        {{ $article->created_at->format('d-m-Y') }}
                                    </small>
                                    <br>
                                    <small>
                                        <i class="feather-clock"></i>
                                        {{ $article->created_at->format('h:i A') }}
                                    </small>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="6" class="text-center">There is no article 😔</td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between align-items-center">
                        {{ $articles->appends(request()->all())->links() }}
                        <h4 class="">Total Articles - {{ $articles->total() }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
