@extends("layouts.app")
@section("title") Edit Category @endsection

@section("content")

    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category Manager</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-edit"></i>
                        Edit Category
                    </h4>
                    <hr>
                    <form action="{{ route('category.update', $category->id) }}" method="post" class="mb-3">
                        @csrf
                        @method('put')
                        <div class="form-inline">
                            <input type="text" name="title" value="{{ old("title", $category->title) }}"
                                   class="form-control form-control-lg mr-2 @error('title') is-invalid @enderror @if(session("message")) is-valid @endif"
                                   placeholder="Add New Category">
                            <button class="btn btn-primary btn-lg">Update</button>
                        </div>
                        @error("title")
                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                        @enderror

                        @if(session("message"))
                            <small class="text-success font-weight-bold">{{ session("message") }}</small>
                        @endif
                    </form>

                    @include('category.list');
                </div>
            </div>
        </div>
    </div>

@endsection