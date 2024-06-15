<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Inscription</title>
    <style>
        body {
            margin: 0;
            color: #333;
            font-family: 'Montserrat', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            width: 100%;
            max-width: 500px;
            margin: auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-content {
            padding: 40px;
        }

        .tab-input {
            display: none;
        }

        .tab-label {
            font-size: 18px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: inline-block;
            width: 50%;
            text-align: center;
        }

        .tab-label:hover {
            background-color: #e0e0e0;
        }

        .tab-input:checked + .tab-label {
            background-color: #f5f5f5;
        }

        .login-form {
            position: relative;
            perspective: 1000px;
            transform-style: preserve-3d;
            transition: transform 0.4s;
            height: 300px;
        }

        .sign-in-form, .sign-up-form {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 20px;
            backface-visibility: hidden;
            overflow-y: auto;
            height: 100%;
        }

        .sign-up-form {
            transform: rotateY(180deg);
        }

        .tab-input#tab-sign-in:checked ~ .login-form {
            transform: rotateY(0deg);
        }

        .tab-input#tab-sign-up:checked ~ .login-form {
            transform: rotateY(180deg);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }

        .input {
            width: calc(100% - 40px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .button {
            width: calc(100% - 40px);
            padding: 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .separator {
            height: 1px;
            background-color: #ccc;
            margin: 20px 0;
        }

        .already-member {
            text-align: center;
            font-size: 14px;
        }

        .already-member label {
            color: #007bff;
            cursor: pointer;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <div class="login-content">
            <input id="tab-sign-in" type="radio" name="tab" class="tab-input" checked>
            <label for="tab-sign-in" class="tab-label">Connexion</label>
            <input id="tab-sign-up" type="radio" name="tab" class="tab-input">
            <label for="tab-sign-up" class="tab-label">Inscription</label>
            <div class="login-form">
                <div class="sign-in-form">
                    <form>
                        <div class="form-group">
                            <label for="username" class="label">Nom d'utilisateur</label>
                            <input id="username" type="text" class="input">
                        </div>
                        <div class="form-group">
                            <label for="password" class="label">Mot de passe</label>
                            <input id="password" type="password" class="input">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button">Se connecter</button>
                        </div>
                    </form>
                    <div class="separator"></div>
                    <div class="already-member">
                        Vous n'avez pas de compte ? <label for="tab-sign-up">Inscrivez-vous maintenant</label>.
                    </div>
                </div>
                <div class="sign-up-form">
                    <form>
                        <div class="form-group">
                            <label for="new-username" class="label">Nom d'utilisateur</label>
                            <input id="new-username" type="text" class="input">
                        </div>
                        <div class="form-group">
                            <label for="new-password" class="label">Mot de passe</label>
                            <input id="new-password" type="password" class="input">
                        </div>
                        <div class="form-group">
                            <label for="confirm-password" class="label">Confirmer le mot de passe</label>
                            <input id="confirm-password" type="password" class="input">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button">S'inscrire</button>
                        </div>
                    </form>
                    <div class="separator"></div>
                    <div class="already-member">
                        Vous avez déjà un compte ? <label for="tab-sign-in">Connectez-vous</label>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
