<?php

namespace App\Http\Controllers;
use App\Cours;
use App\Etape;
use App\EtatCours;
use Khill\Lavacharts\Lavacharts;
use App\Invite;
use App\Scenario;
use App\Statistique;
use Auth;
use DB;

use App\Http\Requests;

class CoursController extends Controller
{
    public function __construct()
    {
        $this->middleware('moniteur');
    }

    public function index(){

        $id_user = auth::user()->id;
        $cours = Cours::cours($id_user);
        if ($cours->isEmpty()){
            $erreur = 'Vous devez d\'abord créer un cours pour pouvoir le consulter.';
            return view('cours/create', compact('erreur'));
        }
        $etat = $cours[0]->etat;
        return view('cours/index', compact('cours'));
    }


    public function create(){
        $erreur = '';
        return view('cours/create', compact('erreur'));
    }



    public function acces($id){

        $cours = Cours::findorFail($id);
        // test si c'est bien la bonne personne qui modifie le cours
        $id_user = auth::user()->id;
        if ($cours->users_id != $id_user) {
            return $this->index();
        }
        $nom = $cours->nom;
        $scenarios = Scenario::orderBy('id')->get();
        $nbScenarios = $scenarios->count();
        $scenariosCours = $cours->scenario;
        $nbScenariosCours = $scenariosCours->count();

        // vérification si on ne doit pas ajouter un nouveau scénario
        if($nbScenarios != $nbScenariosCours){
            foreach($scenarios as $index => $scenario)
            {
                if ($nbScenariosCours < $index + 1)
                {
                    $cours->scenario()->attach($scenario, ['active' => 0]);
                }
            }
            // reload de tous les scenarios disponible après la création
            $scenariosCours = $cours->scenario;

        }

        return view('cours/acces', compact('scenariosCours', 'id', 'nom'));
    }



    public function storeAcces($id){
        $cours = Cours::findorFail($id);
        // test si c'est bien la bonne personne qui modifie le cours
        $id_user = auth::user()->id;
        if ($cours->users_id != $id_user)
        {
            return $this->index();
        }
        // update de l'accès au scénario
        $scenario = $cours->scenario()->where('scenario_id', '=', \Request::input('scenario_id'))->first();
        $scenario->pivot->active = \Request::input('active');
        $scenario->pivot->update();
        $nom = $cours->nom;
        $scenariosCours = $cours->scenario;
        return view('cours/acces', compact('scenariosCours', 'id' ,'nom'));

    }


    public function statistique($id){
        $cours = Cours::findorFail($id);
        // test si c'est bien la bonne personne qui accède au statistique
        $id_user = auth::user()->id;
        if ($cours->users_id != $id_user)
        {
            return $this->index();
        }
        $scenarios = Scenario::get();

        $lava = new Lavacharts;

        foreach($scenarios as $index => $scenario)
        {
            $scores = Statistique::Score($cours->id,$scenario->id)->get(['score']);

            // on get toutes les étapes
            $etapes = Etape::where('scenario_id', '=', $scenario->id)->get();
            $erreur = array_fill(0, $etapes->count(), 0);
            $correct = array_fill(0, $etapes->count(), 0);

            foreach($scores as $score) {
                foreach ($etapes as $i => $etape) {
                    if($score->score <= 0 && $etape->points > 0)
                    {
                        $erreur[$i] += 1;
                        break;
                    }
                    $score->score = $score->score - $etape->points;
                    $correct[$i] = $correct[$i] +1;
                }
            }
            $stat[$index] = \Lava::DataTable();
            $stat[$index]->addStringColumn('Etape')
                ->addNumberColumn('Justes')
                ->addNumberColumn('Fausses');
            foreach ($etapes as $i => $etape) {
                $stat[$index]->addRow(['Etape '.$etape->no_etape, $correct[$i], $erreur[$i]]);
            }

            \LAVA::ColumnChart('Scenario'.$scenario->id, $stat[$index], [
                'title' => 'Graphique des erreurs pour le scénario ' .$scenario->nom . ' :'
            ]);
        }

        return view('cours/statistique', compact('lava', 'scenarios'));

    }


    public function store(){

        $pass1 = \Request::input('pass1');
        $pass2 = \Request::input('pass2');
        if ($pass1 != $pass2)
        {
            $erreur = 'Vos mots de passe ne correspondent pas.';
            return view('cours/create', compact('erreur'));
        }

        // création invites
        $invite = Invite::create(['password' => bcrypt($pass1)]);
        $invite->email = 'invite'. $invite->id .'@firstmed.ch';
        $invite->save();
        $nom = \Request::input('nom');
        $id = auth::user()->id;
        //création cours
        $cours = Cours::create(['nom' =>  $nom, 'users_id' => $id, 'invites_id' => $invite->id, 'etat_cours_id' => 1]);

        //création accès au scénario pour le cours
        $scenarios = Scenario::get();
        foreach($scenarios as $scenario)
        {
            $cours->scenario()->attach($scenario, ['active' => 0]);
        }

        return view('cours/success');
    }

    public function edit($id){
        $cour = Cours::findOrFail($id);
        // test si c'est bien la bonne personne qui modifie le cours
        $id_user = auth::user()->id;
        if ($cour->users_id != $id_user)
        {
            return $this->index();
        }
        $etat= EtatCours::lists('nom', 'id');
        $erreur = '';
        return view('cours/edit', compact('cour','etat', 'erreur'));
    }

    public function update($id)
    {
        $cours = Cours::findOrFail($id);
        // test si c'est bien la bonne personne qui modifie le cours
        $id_user = auth::user()->id;
        if ($cours->users_id != $id_user)
        {
            return $this->index();
        }
        $pass1 = \Request::input('pass1');
        //modification du mot de passe
        if (!($pass1 == '')) {
            $pass2 = \Request::input('pass2');
            if ($pass1 != $pass2)
            {
                $erreur = 'Vos mots de passe ne correspondent pas.';
                return view('cours/create', compact('erreur'));
            }
            // modification du mot de passe de l'invite
            $invite = Cours::findOrFail($id)->invite;
            $invite->password = bcrypt($pass1);
            $invite->save();

        }

        $cours->update(\Request::only('nom', 'etat_cours_id'));
        return redirect(route('cours.index'));

    }

}
