@extends("layouts.app")
@section("title") Create Article @endsection

@section("content")

    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article Lists</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Article</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-plus-circle"></i>
                        Create Article
                    </h4>
                    <form action="{{ route("article.store") }}" method="post" id="createArticle">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label for="category_id">Select Category</label>
                        <select name="category" form="createArticle" id="category_id" class="custom-select custom-select-lg  @error('category') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == old("category") ? "selected" : "" }}>{{ $category->title }}</option>
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
                        <input type="text" form="createArticle" name="title" value="{{ old("title") }}" id="title" class="form-control form-control-lg  @error('title') is-invalid @enderror">
                        @error("title")
                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <label for="description">Article Description</label>
                        <textarea name="description" form="createArticle" id="description" rows="10" class="form-control form-control-lg  @error('description') is-invalid @enderror">{{ old("description") }}</textarea>
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
                        <button type="submit" form="createArticle" class="btn btn-primary w-100 btn-lg">Create Article</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
