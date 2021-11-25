@extends("layouts.app")
@section("title") {{ $article->title }} @endsection
@section("head")

    <style>
        .description {
            white-space: pre-line;
        }
    </style>

@endsection

@section("content")

    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article Lists</a></li>
        <li class="breadcrumb-item active" aria-current="page">Article Detail</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="font-weight-bold">{{ $article->title }}</h4>
                    <div class="">
                        <div class="mt-2 mb-4">
                            <span class="mr-3 text-primary"><i class="feather-layers mr-1"></i>{{ $article->category->title }}</span>
                            <span class="mr-3 text-primary"><i class="feather-user mr-1"></i>{{ $article->user->name }}</span>
                            <small class="mr-3 text-primary">
                                <i class="feather-calendar mr-1"></i>
                                {{ $article->created_at->format('d-m-Y') }}
                            </small>
                            <small class="mr-3 text-primary">
                                <i class="feather-clock mr-1"></i>
                                {{ $article->created_at->format('h:i A') }}
                            </small>
                        </div>
                    </div>
                    <p class="text-black-50 description">{{ $article->description }}</p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <a href="{{ route('article.edit', $article->id) }}" class="btn btn-outline-warning">Edit</a>
                            <form action="{{ route('article.destroy', $article->id) }}" class="d-inline-block" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger"
                                        onclick="return confirm('Are U sure to delete this category?')">Delete
                                </button>
                            </form>
                        </div>
                        <p>{{ $article->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
