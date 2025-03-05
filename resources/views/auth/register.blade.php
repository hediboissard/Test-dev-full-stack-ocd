@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="form-title">Créer un nouveau compte</h2>

        <form action="{{ route('register') }}" method="POST" class="form">
            @csrf

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn-submit">S'inscrire</button>
        </form>

        <div class="alternative-link">
            <a href="{{ route('login') }}">Déjà un compte ? Se connecter</a>
        </div>

    </div>

    <style>
        .container {
            width: 40%;
            margin: 0 auto;
            padding-top: 50px;
        }

        .form-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 1rem;
            margin-bottom: 5px;
        }

        .form-control {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        .form-control:focus {
            border-color: #007bff;
        }

        .error-message {
            color: red;
            font-size: 0.875rem;
            margin-top: 5px;
        }

        .btn-submit {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }

        .alternative-link {
            text-align: center;
            margin-top: 20px;
        }

        .alternative-link a {
            color: #007bff;
            text-decoration: none;
        }

        .alternative-link a:hover {
            text-decoration: underline;
        }
    </style>
@endsection
