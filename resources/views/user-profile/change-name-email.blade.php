@extends("layouts.app")
@section("title") Change Name & Email @endsection

@section("content")

    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card mb-3">
                <div class="card-body">
                    <form action="{{ route('profile.change.name') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">
                                <i class="mr-1 feather-user"></i>
                                Your Name
                            </label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}">
                            @error("name")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" required>
                                <label class="custom-control-label" for="customSwitch1">I'm Sure</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Name
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('profile.change.email') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="email">
                                <i class="mr-1 feather-mail"></i>
                                Your Email
                            </label>
                            <input type="text" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}">
                            @error("email")
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch3" required>
                                <label class="custom-control-label" for="customSwitch3">I'm Sure</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Email
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
