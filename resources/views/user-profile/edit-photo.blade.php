@extends("layouts.app")

@section("title") Edit Photo @endsection

@section("content")

    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <img src="{{ isset(Auth::user()->photo) ? asset("storage/profile/".Auth::user()->photo) : asset("dashboard/img/default-user-img.jpg") }}" class="w-50 d-block mx-auto rounded-circle my-3" alt="">
                    <form action="{{ route("profile.change.photo") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="form-group mb-0 mr-2">
                                <label for="photo">
                                    <i class="feather-image"></i>
                                    Select New Photo
                                </label>
                                <input type="file" name="photo" id="photo" class="form-control mr-2 p-1">
                                @error("photo")
                                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="feather-upload"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
