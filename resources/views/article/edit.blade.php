@extends("layouts.app")
@section("title") Edit Article @endsection

@section("content")

    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article Lists</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-edit"></i>
                        Edit Article
                    </h4>
                    <form action="{{ route("article.update", $article->id) }}" method="post" id="editArticle">
                        @csrf
                        @method("put")
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label for="category_id">Select Category</label>
                        <select name="category" form="editArticle" id="category_id" class="custom-select custom-select-lg  @error('category') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == old("category", $article->category_id) ? "selected" : "" }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error("category")
                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label for="title">Article Title</label>
                        <input type="text" form="editArticle" name="title" value="{{ old("title", $article->title) }}" id="title" class="form-control form-control-lg  @error('title') is-invalid @enderror">
                        @error("title")
                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <label for="description">Article Description</label>
                        <textarea name="description" form="editArticle" id="description" rows="10" class="form-control form-control-lg  @error('description') is-invalid @enderror">{{ old("description", $article->description) }}</textarea>
                        @error("description")
                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <button type="submit" form="editArticle" class="btn btn-primary w-100 btn-lg">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
