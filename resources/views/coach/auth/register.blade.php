<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <x-guest-layout>
      <section class="vh-100" style="background-color: #f8f9fa;">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-10">
              <div class="card text-black shadow" style="border-radius: 1rem;">
                <div class="card-body p-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                      <h2 class="text-center fw-bold mb-4 mt-4">Welcome to Our Coaching Community!</h2>
                      <p class="text-center text-muted mb-4">Join us and take the next step towards achieving your personal and professional goals.</p>
                      <form method="POST" action="{{ route('coach/register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                          <label for="name" class="form-label">Your Name</label>
                          <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required autofocus autocomplete="name">
                          </div>
                          @error('name')
                          <div class="text-danger mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group mb-3">
                          <label for="email" class="form-label">Your Email</label>
                          <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required autocomplete="email">
                          </div>
                          @error('email')
                          <div class="text-danger mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group mb-3">
                          <label for="password" class="form-label">Password</label>
                          <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password">
                          </div>
                          @error('password')
                          <div class="text-danger mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group mb-3">
                          <label for="password_confirmation" class="form-label">Repeat your password</label>
                          <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password">
                          </div>
                          @error('password_confirmation')
                          <div class="text-danger mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group mb-3">
                          <label for="profile_image" class="form-label">Profile Image</label>
                          <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                            <input type="file" id="profile_image" name="profile_image" class="form-control">
                          </div>
                          @error('profile_image')
                          <div class="text-danger mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="d-grid gap-2">
                          <button type="submit" class="btn btn-primary btn-lg">Join Now</button>
                        </div>
                      </form>
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Coaching image">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </x-guest-layout>
</body>
</html>
