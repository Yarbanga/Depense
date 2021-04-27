<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caisse;
use App\Models\MouvementCaisse;
use App\Models\Approvisionnement;
use App\Models\Depense;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Valodator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class ValidationController extends Controller
{
    public $statutCaisse;
    public function __construct()
    {
        $this->middleware('auth');
        $this->statutCaisse = Caisse::select('solde', 'etat')->first();
    }

    public function getDepenseToValidate()
    {
        $statutCaisse = $this->statutCaisse;
        $depenses = DB::table('depenses')->join('nature_depenses', 'depenses.nature_depense_id', 'nature_depenses.id')
                                                ->select('depenses.*', 'nature_depenses.designation')
                                                // ->where('statut', 0)
                                                ->orderBy('dateDepense', 'DESC')->get();
        return view('validations.depenses_to_validate', compact('depenses', 'statutCaisse'));
    }

    public function showDepense($id)
    {
        $statutCaisse = $this->statutCaisse;
        $depense = DB::table('depenses')->join('nature_depenses', 'depenses.nature_depense_id', 'nature_depenses.id')
                                                ->select('depenses.*', 'nature_depenses.designation')
                                                ->where('depenses.id', $id)->first();
        return view('validations.validate_depense', compact('depense', 'statutCaisse'));
    }

    public function validateDepense($id)
    {
        Depense::where('id', $id)->update(['statut' =>1]);
        return redirect()->route('depense_to_validate.get')->with('success', 'La dépense est validée!');
    }

    public function rejeterDepense($id)
    {
        $statutCaisse = $this->statutCaisse;
        $depense = Depense::find($id);
        $newSolde = $statutCaisse->solde + $depense->montant;
        Depense::where('id', $id)->update(['statut' => 2]);
        DB::table('caisses')->update(['solde' => $newSolde]);
        return redirect()->route('depense_to_validate.get')->with('success', 'La dépense a été réjetée.');
    }

    public function getApprovisionnementToValidate()
    {
        $statutCaisse = $this->statutCaisse;
        $appros = DB::table('approvisionnements')->join('type_approvisionnements', 'approvisionnements.type_approvisionnement_id', 'type_approvisionnements.id')
                                                ->select('approvisionnements.*', 'type_approvisionnements.libelle')
                                                // ->where('statut', 0)
                                                ->orderBy('dateAppro', 'DESC')->get();
        return view('validations.approvisionnements_to_validate', compact('appros', 'statutCaisse'));
    }

    public function showApprovisionnement($id)
    {
        $statutCaisse = $this->statutCaisse;
        $appro = DB::table('approvisionnements')->join('type_approvisionnements', 'approvisionnements.type_approvisionnement_id', 'type_approvisionnements.id')
                                                ->select('approvisionnements.*', 'type_approvisionnements.libelle')
                                                ->where('approvisionnements.id', $id)->first();
        return view('validations.validate_approvisionnement', compact('appro', 'statutCaisse'));
    }

    public function validateApprovisionnement($id)
    {
        Approvisionnement::where('id', $id)->update(['statut' =>1]);
        return redirect()->route('approvisionnement_to_validate.get')->with('success', 'L\'approvisionnement est validé!');
    }

    public function rejeterApprovisionnement($id)
    {
        $statutCaisse = $this->statutCaisse;
        $appro = Approvisionnement::find($id);
        $newSolde = $statutCaisse->solde - $appro->montantAppro;
        Approvisionnement::where('id', $id)->update(['statut' => 2]);
        DB::table('caisses')->update(['solde' => $newSolde]);
        return redirect()->route('approvisionnement_to_validate.get')->with('success', 'L\'approvisionnement a été réjeté.');
    }
}
