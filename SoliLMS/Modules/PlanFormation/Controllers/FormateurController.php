<?php

namespace Modules\PlanFormation\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\PlanFormation\Services\FormateurService;
use Modules\PlanFormation\Models\Formateur;
use Modules\PlanFormation\Models\User;

class FormateurController extends Controller
{
    protected $formateurService;

    public function __construct(FormateurService $formateurService)
    {
        $this->formateurService = $formateurService;
    }

    public function index()
    {
        $formateurs = Formateur::with('user')->get();
        return view('PlanFormation::formateur.index', compact('formateurs'));
    }


    public function create()
    {
        return view('PlanFormation::formateur.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',

            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
        ]);

        $userData = $request->only('name', 'email', 'password');
        $formateurData = $request->only('nom', 'prenom', 'telephone');

        $user = $this->formateurService->createUserWithFormateur($userData, $formateurData);

        // return redirect()->route('formateurs.index', $user->formateur->id)->with('success', 'Formateur créé avec succès.');
        return redirect()->route('formateurs.index')->with('success', 'Formateur créé avec succès.');

    }

    public function show($id)
    {
        $formateur = \Modules\PlanFormation\Models\Formateur::with('user')->findOrFail($id);
        return view('PlanFormation::formateur.show', compact('formateur'));
    }

}
