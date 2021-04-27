<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use App\Models\MouvementCaisse;
use App\Models\Approvisionnement;
use App\Models\Depense;
use App\Charts\DepenseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Valodator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $statutCaisse;
    public function __construct()
    {
        $this->middleware('auth');
        $this->statutCaisse = Caisse::select('solde', 'etat')->first();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $statutCaisse = $this->statutCaisse;
        $depenses = MouvementCaisse::where('statut', 0)->orderBy('dateFermeture', 'DESC')->select('totalDepense')->take(7)->get();
        $depensesHeb = $depenses->toArray();
        // dd(array_values($depenses->toArray()));
        // Evolution des dépenses par semaine
        $depenseChart = new DepenseChart;
        $depenseChart->labels(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche']);
        foreach ($depenses as $key => $value) {
            $depenseChart->dataset('', 'line', [$value->totalDepense])
            ->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(255, 99, 132)");
        }
        // dd($depenseChart);
        return view('c_dashboard', compact('statutCaisse', 'depenseChart'));
    }

    public function getOuvertureCaisse()
    {
        $statutCaisse = $this->statutCaisse;
        return view('caisses.ouverture_caisse', compact('statutCaisse'));
    }

    public function ouvrirCaisse(Request $request)
    {
        $data = $request->validate([
            'dateOuverture' => 'required',
            'soldeOuverture' => 'required',
            // 'code' => 'required|max:6'
        ]);
        $statutCaisse = $this->statutCaisse;
        MouvementCaisse::create([
            'user_id' => Auth::user()->id,
            'caisse_id' => 1,
            'dateOuverture' => $data['dateOuverture'],
            'soldeOuverture' => $data['soldeOuverture'],
        ]);
        DB::table('caisses')->update(['solde' => $data['soldeOuverture'], 'etat' => 1]);
        return redirect()->route('dashboard')->with('success', 'La caisse est ouverte!');
    }

    public function getFermetureCaisse()
    {
        $statutCaisse = $this->statutCaisse;
        $dateSoldeOuv = MouvementCaisse::where('statut', 1)->select('dateOuverture', 'soldeOuverture')->first();
        $approvs = DB::table('approvisionnements')->join('mouvement_caisses', 'approvisionnements.mouvement_caisse_id', 'mouvement_caisses.id')
                                                ->select('mouvement_caisses.statut', 'approvisionnements.montantAppro', 'approvisionnements.statut')
                                                ->where('approvisionnements.statut', 1)
                                                ->where('mouvement_caisses.statut', 1)->get();
        $totalApprov = $approvs->sum('montantAppro');
        $deps = DB::table('depenses')->join('mouvement_caisses', 'depenses.mouvement_caisse_id', 'mouvement_caisses.id')
                                                ->select('mouvement_caisses.statut', 'depenses.montant', 'depenses.statut')
                                                ->where('depenses.statut', 1)
                                                ->where('mouvement_caisses.statut', 1)->get();
        $totalDep = $deps->sum('montant');
        $soldeTheo = ($totalApprov + $dateSoldeOuv->soldeOuverture) - $totalDep;
        return view('caisses.fermeture_caisse', compact('statutCaisse', 'dateSoldeOuv', 'totalApprov', 'totalDep', 'soldeTheo'));
    }

    public function fermerCaisse(Request $request)
    {
        $data = $request->validate([
            'dateFermeture' => ['required', 'date'],
            'soldeFermeture' => ['required', 'numeric'],
            'totalAppro' => ['required', 'numeric'],
            'totalDepense' => ['required', 'numeric'],
            'soldeTheorique' => ['required', 'numeric'],
            'soldePhysique' => ['required', 'numeric'],
            'ecart' => ['required', 'numeric'],
        ]);
        MouvementCaisse::where('statut', 1)->update([
            'dateFermeture' => $data['dateFermeture'],
            'soldeFermeture' => $data['soldeFermeture'],
            'totalAppro' => $data['totalAppro'],
            'totalDepense' => $data['totalDepense'],
            'soldeTheorique' => $data['soldeTheorique'],
            'soldePhysique' => $data['soldePhysique'],
            'ecart' => $data['soldeTheorique'],
            'statut' => 0
        ]);
        DB::table('caisses')->update(['solde' => $data['soldeFermeture'], 'etat' => 0]);
        return redirect()->route('dashboard')->with('success', 'La caisse bien été fermée!');
    }

    public function listApprovisionnement()
    {
        $statutCaisse = $this->statutCaisse;
        $appros = DB::table('approvisionnements')->join('type_approvisionnements', 'approvisionnements.type_approvisionnement_id', 'type_approvisionnements.id')
                                                ->select('approvisionnements.*', 'type_approvisionnements.libelle')
                                                ->where('statut', 1)
                                                ->orderBy('dateAppro', 'DESC')->get();
        return view('operation_caisses.list_approvisionnement', compact('appros', 'statutCaisse'));
    }

    public function getApprovisionnement()
    {
        $statutCaisse = $this->statutCaisse;
        $caisse = Caisse::select('solde')->first();
        $actuelSolde = $caisse->solde;
        $typeAppro = DB::table('type_approvisionnements')->get();
        if ($statutCaisse->etat == 0) {
            return redirect()->back()->with('warning', 'Veuillez ouvrir la caisse d\'abord!');
        } else {
            return view('operation_caisses.approvisionnement', compact('statutCaisse', 'actuelSolde', 'typeAppro'));
        }
        
    }

    public function saveApprovisionnement(Request $request)
    {
        $data = $request->validate([
            'dateAppro' => ['required', 'date'],
            // 'soldeOuverture' => ['required', 'numeric'],
            'montantAppro' => ['required', 'numeric'],
            'source' => ['required', 'numeric'],
            'nouveauSolde' => ['required', 'numeric'],
            'type_approvisionnement_id' => ['required', 'numeric'],
        ]);
        $mvtCaisseId = MouvementCaisse::where('statut', 1)->select('id')->first();
        Approvisionnement::create([
            'user_id' => $request->get('user_id'),
            'type_approvisionnement_id' => $data['type_approvisionnement_id'],
            'mouvement_caisse_id' => $mvtCaisseId->id,
            'dateAppro' => $data['dateAppro'],
            // 'soldeOuverture' => $data['soldeOuverture'],
            'montantAppro' => $data['montantAppro'],
            'source' => $data['source'],
            'nouveauSolde' => $data['nouveauSolde'],
        ]);
        $soldeCaisse = Caisse::where('etat', 1)->first();
        $newSolde = $data['montantAppro'] + $soldeCaisse->solde;
        DB::table('caisses')->update(['solde'=> $newSolde]);
        return redirect()->route('dashboard')->with('success', 'L\'approvisionnement a bien été effectué!');
    }

    public function listDepense()
    {
        $statutCaisse = $this->statutCaisse;
        $depenses = DB::table('depenses')->join('nature_depenses', 'depenses.nature_depense_id', 'nature_depenses.id')
                                                ->select('depenses.*', 'nature_depenses.designation')
                                                ->where('statut', 1)
                                                ->orderBy('dateDepense', 'DESC')->get();
        $totalDep = $depenses->sum('montant');
        return view('operation_caisses.list_depense', compact('depenses', 'statutCaisse', 'totalDep'));
    }
    public function getDepense()
    {
        $statutCaisse = $this->statutCaisse;
        $natureDep = DB::table('nature_depenses')->get();
        $projets = DB::table('projets')->get();
        $agents = DB::table('agents')->get();
        if ($statutCaisse->etat == 0) {
            return redirect()->back()->with('warning', 'Veuillez ouvrir la caisse d\'abord!');
        } else {
            return view('operation_caisses.depenses', compact('statutCaisse', 'natureDep', 'projets', 'agents'));
        }
    }

    public function saveDepense(Request $request)
    {
        $data = $request->validate([
            'dateSaisie' => ['required', 'date'],
            'dateDepense' => ['required', 'date'],
            'montant' => ['required', 'numeric'],
            'fournisseur' => ['required', 'string'],
            'description' => ['required'],
            // 'commentaire' => ['required'],
            'nature_depense_id' => ['required', 'numeric'],
            'fichier' => ['required', 'max:2048']
        ]);
        if($request->file('fichier')) {
            $nomFich = time().'_'.$request->fichier->getClientOriginalName();
            $chemin = $request->file('fichier')->storeAs('storage/uploads', $nomFich, 'public');
        }else{
            $nomFich = $chemin ='';
        }
        $mvtCaisseId = MouvementCaisse::where('statut', 1)->select('id')->first();
        $soldeCaisse = Caisse::where('etat', 1)->first();
        if ($soldeCaisse->solde  > $data['montant']) {
            $newSolde = $soldeCaisse->solde - $data['montant'];
            Depense::create([
                'user_id' => Auth::user()->id,
                'agent_id' => $request->get('agent_id'),
                'projet_id' => $request->get('projet_id'),
                'mouvement_caisse_id' => $mvtCaisseId->id,
                'dateSaisie' => $data['dateSaisie'],
                'dateDepense' => $data['dateDepense'],
                'nouveauSolde' => $newSolde,
                'montant' => $data['montant'],
                'fournisseur' => $data['fournisseur'],
                'description' => $data['description'],
                // 'commentaire' => $data['commentaire'],
                'nature_depense_id' => $data['nature_depense_id'],
                'fichier' => $nomFich,
                'filePath' => $chemin,
            ]);
            DB::table('caisses')->update(['solde' => $newSolde]);
        }else{
            return redirect()->back()->with('warning', 'Le solde de la caisse est insuffisant pour effectuer cette opération. Veuillez faire un approvisionnement!');
        }
        return redirect()->route('dashboard')->with('success', 'La depense a bien été prise en compte.');
    }
}