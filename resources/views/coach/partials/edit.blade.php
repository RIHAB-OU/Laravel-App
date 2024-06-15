<!-- coach/edit.blade.php -->

<!-- Inclure Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-JxwXwZy7zYSqrgurXKnL8HplzRj+CvYmYwGXbPIf6qfHnhKRLVZprY93RLsDTEg8PyIWfddcqtbsBvP2EVxlYw==" crossorigin="anonymous" />

<style>
    .center-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Ajuster la hauteur pour remplir entièrement la vue */
    }

    .card {
        width: 80%; /* Ajuster la largeur de la carte */
        max-width: 600px; /* Limiter la largeur maximale */
        border: 1px solid #ccc; /* Ajouter une bordure */
        border-radius: 10px; /* Ajouter des coins arrondis */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ajouter une ombre */
    }

    .card-header {
        background-color: #007bff; /* Couleur de fond du titre */
        color: #fff; /* Couleur du texte du titre */
        font-weight: bold; /* Police en gras */
        padding: 10px 20px; /* Ajouter un espace intérieur */
        border-top-left-radius: 10px; /* Coins arrondis en haut à gauche */
        border-top-right-radius: 10px; /* Coins arrondis en haut à droite */
    }

    .card-body {
        padding: 20px; /* Ajouter un espace intérieur */
    }

    .form-group {
        margin-bottom: 20px; /* Ajouter un espace entre les champs */
    }

    label {
        font-weight: bold; /* Police en gras pour les étiquettes */
    }

    .btn-primary {
        background-color: #007bff; /* Couleur de fond du bouton */
        border-color: #007bff; /* Couleur de la bordure du bouton */
        padding: 10px 20px; /* Ajouter un espace intérieur */
        font-size: 16px; /* Taille de police */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Couleur de fond du bouton au survol */
        border-color: #0056b3; /* Couleur de la bordure du bouton au survol */
    }
</style>

<div class="center-container">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">{{ __('Edit Profile') }}</div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('coach.update') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name"><i class="fas fa-user"></i> {{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $coach->name) }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> {{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $coach->email) }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone"><i class="fas fa-phone"></i> {{ __('Phone') }}</label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $coach->phone) }}" autocomplete="phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock"></i> {{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm"><i class="fas fa-lock"></i> {{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                    </div>

                    <!-- Add more fields as needed -->

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('Update Profile') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
