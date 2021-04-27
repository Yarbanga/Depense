<?php

namespace App\Http\Controllers;

use App\Models\NatureDepense;
use App\Models\TypeApprovisionnement;
use App\Models\Caisse;
use App\Models\Projet;
use App\Models\Pole;
use App\Models\Agent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Valodator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ParametreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getProject()
    {
        $statutCaisse = Caisse::select('etat')->first();
        $projets = Projet::all();
        return view('parametres.projets', compact('statutCaisse', 'projets'));
    }

    public function saveProject(Request $request)
    {
        $data = $request->validate([
            'intitule' => ['required', 'string', 'unique:projets'],
            'description' => ['required', 'string'],
        ]);
        Projet::create(['intitule' => $data['intitule'], 'description' => $request->get('description')]);
        return redirect()->back()->with('success', 'Le projet a été bien ajouté');
    }

    public function updateProject(Request $request, $id)
    {
        $data = $request->validate([
            'intitule' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);
        Projet::where('id', $id)->update(['intitule' => $data['intitule'], 'description' => $request->get('description')]);
        return redirect()->back()->with('success', 'Le projet a été bien modifié!');
    }

    public function getTypeAppro()
    {
        $statutCaisse = Caisse::select('etat')->first();
        $typeAppros = TypeApprovisionnement::all();
        return view('parametres.type_approvisionnements', compact('statutCaisse', 'typeAppros'));
    }

    public function saveTypeAppro(Request $request)
    {
        $data = $request->validate([
            'libelle' => ['required', 'string', 'unique:type_approvisionnements'],
            'description' => ['required', 'string'],
        ]);
        TypeApprovisionnement::create(['libelle' => $data['libelle'], 'description' => $request->get('description')]);
        return redirect()->back()->with('success', 'Le type d\'approvisionnement a été bien ajouté');
    }

    public function updateTypeAppro(Request $request, $id)
    {
        $data = $request->validate([
            'libelle' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);
        TypeApprovisionnement::where('id', $id)->update(['libelle' => $data['libelle'], 'description' => $data['description']]);
        return redirect()->back()->with('success', 'Le type d\'approvisionnement a été bien modifié');
    }

    public function getTypeDep()
    {
        $statutCaisse = Caisse::select('etat')->first();
        $natureDepenses = NatureDepense::all();
        return view('parametres.nature_depense', compact('statutCaisse', 'natureDepenses'));
    }

    public function saveTypeDep(Request $request)
    {
        $data = $request->validate([
            'designation' => ['required', 'string', 'unique:nature_depenses'],
            'description' => ['required', 'string'],
        ]);
        NatureDepense::create(['designation' => $data['designation'], 'description' => $request->get('description')]);
        return redirect()->back()->with('success', 'La nature de dépense a été bien ajouté');
    }

    public function updateTypeDep(Request $request, $id)
    {
        $data = $request->validate([
            'designation' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);
        DB::table('nature_depenses')->where('id', $id)->update(['designation' => $data['designation'], 'description' => $request->get('description')]);
        return redirect()->back()->with('success', 'La nature de dépense a été bien modifiéé');
    }

    public function getPole()
    {
        $statutCaisse = Caisse::select('etat')->first();
        $poles = Pole::all();
        return view('parametres.poles', compact('statutCaisse', 'poles'));
    }

    public function storePole(Request $request)
    {
        $data = $request->validate([
            'code' => ['required', 'string', 'unique:poles'],
            'libelle' => ['required', 'string'],
        ]);
        Pole::create(['code' => $data['code'], 'libelle' => $data['libelle']]);
        return redirect()->back()->with('success', 'Le pole a été bien créé!');
    }

    public function updatePole(Request $request, $id)
    {
        $data = $request->validate([
            'code' => ['required', 'string'],
            'libelle' => ['required', 'string'],
        ]);
        DB::table('poles')->where('id', $id)->update(['code' => $data['code'], 'libelle' => $data['libelle']]);
        return redirect()->back()->with('success', 'Le pole a été bien modifié!');
    }

    public function getAgent()
    {
        $statutCaisse = Caisse::select('etat')->first();
        $poles = Pole::all();
        $agents = DB::table('agents')->join('poles', 'agents.pole_id', 'poles.id')
                                    ->select('agents.*', 'poles.libelle')->orderBy('id', 'DESC')->get();
        return view('parametres.agent', compact('statutCaisse', 'agents', 'poles'));
    }

    public function storeAgent(Request $request)
    {
        $data = $request->validate([
            'code' => ['required', 'string', 'max:6', 'unique:agents'],
            'nom' => ['required', 'max:50'],
            'prenom' => ['required', 'max:50'],
            'pole_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:agents'],
        ]);
        Agent::create([
            'code' => $data['code'],
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'pole_id' => $data['pole_id'],
            'email' => $data['email'],
        ]);
        return redirect()->back()->with('success', 'L\'agent a bien été enregistré!');
    }

    public function updateAgent(Request $request, $id)
    {
        $data = $request->validate([
            'code' => ['required', 'string', 'max:6'],
            'nom' => ['required', 'max:50'],
            'prenom' => ['required', 'max:50'],
            'pole_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        DB::table('agents')->where('id', $id)->update([
            'code' => $data['code'],
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'pole_id' => $data['pole_id'],
            'email' => $data['email'],
        ]);
        return redirect()->back()->with('success', 'L\'agent a bien été modifié!');
    }
}