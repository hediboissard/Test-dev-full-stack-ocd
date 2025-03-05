<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::all();
        return view('people.index', compact('people'));
    }

    public function show($id)
    {
        $person = Person::with(['children', 'parents'])->findOrFail($id);
        return view('people.show', compact('person'));
    }

    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('message', 'Veuillez vous connecter pour créer une personne.');
        }

        return view('people.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_names' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_name' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
        ]);

        $person = new Person();
        $person->created_by = auth()->id();
        $person->first_name = ucfirst(strtolower($validated['first_name']));
        $person->middle_names = $validated['middle_names']
            ? implode(' ', array_map('ucwords', explode(',', $validated['middle_names'])))
            : null;
        $person->last_name = strtoupper($validated['last_name']);
        $person->birth_name = $validated['birth_name']
            ? strtoupper($validated['birth_name'])
            : strtoupper($validated['last_name']);
        $person->date_of_birth = $validated['date_of_birth'] ?? null;

        $person->save();

        return redirect()->route('people.index')->with('success', 'Personne créée avec succès!');
    }
}
