{{-- resources/views/people/create.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Personne</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: grid;
            grid-gap: 20px;
        }
        label {
            font-size: 1rem;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="date"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }
        input[type="text"]:focus,
        input[type="date"]:focus {
            outline: none;
            border-color: #66afe9;
        }
        button {
            background-color: #5cb85c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .alert {
            padding: 15px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .text-center {
            text-align: center;
        }
        .link-container {
            text-align: center;
            margin-top: 20px;
        }
        .link-container a {
            color: #007bff;
            text-decoration: none;
        }
        .link-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Créer une Personne</h2>

        @if (!auth()->check())
            <div class="alert">
                <p>Vous devez être connecté pour créer une personne.</p>
                <a href="{{ route('login') }}">Se connecter</a>
                <p>Ou <a href="{{ route('people.index') }}">continuer sans être connecté</a>.</p>
            </div>
        @else
            <form method="POST" action="{{ route('people.store') }}">
                @csrf
                <div>
                    <label for="first_name">Prénom</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>

                <div>
                    <label for="middle_names">Autres prénoms</label>
                    <input type="text" id="middle_names" name="middle_names">
                </div>

                <div>
                    <label for="last_name">Nom de famille</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>

                <div>
                    <label for="birth_name">Nom de naissance</label>
                    <input type="text" id="birth_name" name="birth_name">
                </div>

                <div>
                    <label for="date_of_birth">Date de naissance</label>
                    <input type="date" id="date_of_birth" name="date_of_birth">
                </div>

                <button type="submit">Créer</button>
            </form>
        @endif
    </div>

</body>
</html>
