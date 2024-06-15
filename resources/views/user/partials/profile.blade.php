<!-- resources/views/user/index.blade.php -->
<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/profiles/' . Auth::user()->profile_image) }}" alt="User" class="rounded-circle img-fluid" width="150">
                        <div class="mt-3">
                            <h4>{{ Auth::user()->name }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <h6 class="mb-0"><i class="fas fa-user"></i> Full Name</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{ Auth::user()->name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <h6 class="mb-0"><i class="fas fa-envelope"></i> Email</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{ Auth::user()->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <h6 class="mb-0"><i class="fas fa-phone"></i> Phone</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{ Auth::user()->phone }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <a class="btn btn-info" href="{{ route('user.edit') }}"><i class="fas fa-edit"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-info-circle"></i> Additional Information</h5>
                    </div>
                    <div class="card-body">
                        <!-- Additional information fields can be added here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
