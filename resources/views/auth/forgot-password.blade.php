<x-guest-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ __('Password Reset') }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f1f3f5;
                color: #495057;
            }
            .container {
                max-width: 400px;
                margin: 50px auto;
                padding: 30px;
                border-radius: 10px;
                background-color: #fff;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            }
            .form-title {
                font-size: 24px;
                margin-bottom: 20px;
                text-align: center;
                font-weight: bold;
                color: #007bff; /* Couleur vive pour attirer l'attention */
            }
            .form-group {
                margin-bottom: 20px;
            }
            label {
                font-weight: bold;
                color: #495057;
            }
            input[type="email"] {
                width: 100%;
                padding: 12px;
                border: 1px solid #ced4da;
                border-radius: 5px;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }
            input[type="email"]:focus {
                border-color: #007bff;
                outline: 0;
                box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            }
            .btn-primary {
                width: 100%;
                padding: 12px;
                font-size: 18px;
                border-radius: 5px;
                background-color: #007bff;
                border: none;
                transition: background-color 0.15s ease-in-out;
            }
            .btn-primary:hover {
                background-color: #0056b3;
            }
            .text-danger {
                color: #dc3545;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="form-title">{{ __('Password Reset') }}</div>
            <!-- Session Status -->
            <div class="text-center text-danger mb-3">
                <x-auth-session-status :status="session('status')" />
            </div>
            <!-- Password Reset Form -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <label for="email">{{ __('Enter your Email Address') }}</label> <!-- Adverbe ajouté -->
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Send Password Reset Link') }}</button>
            </form>
        </div>
    </body>
    </html>
</x-guest-layout>
