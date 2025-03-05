<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 400px;
            margin: 50px auto;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .input-field {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn-submit:hover {
            background-color: #45a049;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
        .guest-link {
            text-align: center;
        }
        .guest-link a {
            color: #007bff;
            text-decoration: none;
        }

        .guest-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Se connecter</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <input type="email" name="email" id="email" class="input-field" placeholder="Email" required>
            </div>
            <div>
                <input type="password" name="password" id="password" class="input-field" placeholder="Mot de passe" required>
            </div>
            <div>
                <button type="submit" class="btn-submit">Se connecter</button>
            </div>
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </form>
        <div class="text-center mt-4">
            <p>Vous n'avez pas de compte ? <a href="{{ route('register') }}" class="text-blue-500">S'inscrire ici</a></p>
        </div>
        <div class="guest-link">
            <a href="{{ route('people.index') }}">Continuer en tant qu'invité</a>
        </div>
    </div>
</body>
</html>
