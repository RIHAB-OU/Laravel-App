<div class="container my-5">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/profiles/' . Auth::user()->profile_image) }}" alt="User" class="rounded-circle img-thumbnail" width="150">
                        <div class="mt-3">
                            <h4 class="font-weight-bold">{{ Auth::user()->name }}</h4>
                            <p class="text-muted mb-1">Admin Profile</p>
                            <a href="{{ route('admin.profile') }}" class="btn btn-outline-primary mt-2"><i class="fas fa-edit"></i> Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3 shadow-sm border-0 rounded-lg">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0"><i class="fas fa-user"></i> Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ Auth::user()->name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0"><i class="fas fa-envelope"></i> Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ Auth::user()->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0"><i class="fas fa-phone"></i> Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ Auth::user()->phone }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 text-end">
                                <a class="btn btn-primary" href="{{ route('admin.edit') }}"><i class="fas fa-edit"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-0 rounded-lg mt-3">
                    <div class="card-body">
                        <h5 class="mb-3"><i class="fas fa-info-circle"></i> Additional Information</h5>
                        <p class="text-secondary">Add any other relevant information about the user here.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: 1px solid #e5e5e5;
        border-radius: 10px;
        transition: transform 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .card-body h4 {
        font-weight: bold;
        font-size: 1.5rem;
    }
    .img-thumbnail {
        border-radius: 50%;
        max-width: 150px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .shadow-sm {
        box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075);
    }
    .text-secondary {
        color: #6c757d;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        transition: background-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .btn-outline-primary {
        color: #007bff;
        border-color: #007bff;
        transition: color 0.3s, border-color 0.3s;
    }
    .btn-outline-primary:hover {
        color: #0056b3;
        border-color: #0056b3;
    }
    .font-weight-bold {
        font-weight: bold;
    }
</style>
