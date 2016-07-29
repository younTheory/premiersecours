<?php

namespace App\Http\Controllers;

use App\Statistique;
use Illuminate\Http\Request;
use App\Scenario;
use App\Etape;
use App\Cours;
use App\Reponse;
use App\Http\Requests;

class ScenarioInviteController extends Controller
{
    public function __construct()
    {
        $this->middleware('invite');
    }
    // affiche le nom du cours au participant
    public function cours(){
        $id_invite = auth()->guard('invites')->user()->id;
        $cours = Cours::where('invites_id', '=', $id_invite)->first();
        return view('invite/cours', compact('cours'));
    }
    // retourne la liste des scénarios au participant
    public function liste(){
        \Session::put('id_etape', 0);
        $id_invite = auth()->guard('invites')->user()->id;
        $cours = Cours::where('invites_id', '=', $id_invite)->first();
        $scenarios = $cours->scenarioActive;
        $etapes = array();
        foreach($scenarios as $scenario)
        {
            array_push($etapes,Etape::PremiereEtapeByScenario($scenario->id)->get());
        }
        return view('invite/scenario/scenarios', compact('scenarios', 'etapes'));
    }

    // Permet de vérifier que la valeur post envoyée par l'utilisateur n'a pas été modifiée
    // Paramètre $étape : correspond à l'étape que l'utilisateur tente d'accéder
    // Retourne 0 : si l'étape n'a pas été modifiée.
    // Retourne 1 : si l'utilisateur a changé le paramètre post après la première étape.
    // Retourne 2: si l'utilisateur a changé le paramètre post avant d'arriver sur la première étape.
    public function verifyPost($etape)
    {
        $id_last_etape = \Session::get('id_etape');
        // test pour éviter de se retrouver à la 15 ème étape scénario après la liste des scénarios
        if($id_last_etape == 0)
        {
            if ($etape->no_etape != 1)
            {
                return 2;
            }
        }
        else{
            $last_etape = Etape::findorFail($id_last_etape);
            // si l'étape ne suit pas la précédente ou changement de scénario alors on retourne false
            if ($last_etape->no_etape + 1 != $etape->no_etape or $last_etape->scenario_id != $etape->scenario_id)
            {
                return 1;
            }
        }
        return 0;
    }
    // permet d'afficher la bonne étape au participant
    public function index(){
        $id_etape = \Request::input('etapes_id');
        $etape = Etape::findorFail($id_etape);
        // test pour la validation des postes
        $test = $this->verifyPost($etape);
        // on retourne le score si modification.
        if($test == 1)
        {
            return $this->score();
        }
        // on retourne la liste si c'est une modification au début.
        elseif ($test == 2)
        {
            return $this->liste();
        }


        $images = $etape->image;
        $reponses = $etape->reponse;
        $type = $etape->typeEtape->nom;
        if ($type == 'information')
        {
            \Session::set('id_etape',$etape->id);
        }
        if ($type != 'images') {
            if ($images[0]->pivot->modification == 0) {
                $lien = $images[0]->lien_image;
            } else {
                $lien = $images[1]->lien_image;
            }

            return view('invite/scenario/' . $type, compact('etape', 'reponses', 'lien'));
        }
        return view('invite/scenario/' . $type, compact('etape', 'reponses'));
    }


    // sauvegarde le score du participant
    public function score(){

        $id_etape = \Session::get('id_etape');
        $points = 0;
        if ($id_etape != 0)
        {
            $etape = Etape::findorFail($id_etape);
            $points = Etape::Points($etape->no_etape, $etape->scenario_id)->sum('points');
        }
        else{
            $id_etape = \Request::input('etapes_id');
            $etape = Etape::findorFail($id_etape);
        }
        $id_invite = auth()->guard('invites')->user()->id;
        $cours = Cours::where('invites_id', '=', $id_invite)->first();
        Statistique::create(['scenario_id' => $etape->scenario_id, 'cours_id' => $cours->id, 'score' => $points ]);
        return view('invite/scenario/score',  compact('points'));
    }



    public function invite()
    {
        $id_invite = auth()->guard('invites')->user()->id;
        $nom = Cours::where('invites_id', '=', $id_invite)->first()->nom;
        return view('invite/index', compact('nom'));
    }

    // vérifie la réponse envoyée par le participant
    public function store(){

        $id_etape = \Request::input('etapes_id');
        $etape = Etape::findorFail($id_etape);


        // test pour la validation des postes
        $test = $this->verifyPost($etape);
        // on retourne le score si modification.
        if($test == 1)
        {
            return $this->score();
        }
        // on retourne la liste si c'est une modification au début.
        elseif ($test == 2)
        {
            return $this->liste();
        }


        $images = $etape->image;
        $nberreur = 0;
        // on va chercher le bon lien d'image
        if (count($images) > 1) {
            // on test si la modification est avant l'image standard
            if ($images[0]->pivot->modification == 0) {
                $lien = $images[1]->lien_image;
            } else {
                $lien = $images[0]->lien_image;
            }

        } else {
            $lien = $images[0]->lien_image;
        }

        if ($etape->typeEtape->nom == 'reponsemultiple')
        {
            $reponses = $etape->reponse;
            $repsUser = \Request::input('rep');
            $rep= Reponse::findorFail($etape->reponse_id);
            $repTrues = explode(',',$rep->reponse);
            foreach($reponses as $index => $reponse)
            {
                if (!((in_array($reponse->id,$repTrues) and in_array($reponse->id,$repsUser)) or (!(in_array($reponse->id,$repTrues)) and !(in_array($reponse->id,$repsUser))))){
                    $nberreur++;
                }

            }
            if($nberreur == 0)
            {
                $id = 0;
                if ($etape->no_etape < $etape->scenario->nb_etape) {
                    $id = $etape->etapeSuivante()->id;
                }
                \Session::set('id_etape',$etape->id);
                return view('invite/scenario/etape_valide', compact('etape', 'id', 'lien'));
            }
            return view('invite/scenario/etape_multi_fausse', compact('etape', 'nberreur', 'lien'));

        }
        else {

            $rep_id = \Request::input('rep');
            if ($rep_id == $etape->reponse_id) {
                $id = 0;
                if ($etape->no_etape < $etape->scenario->nb_etape) {
                    $id = $etape->etapeSuivante()->id;
                }
                \Session::set('id_etape',$etape->id);
                return view('invite/scenario/etape_valide', compact('etape', 'id', 'lien'));
            }
        }
        return view('invite/scenario/etape_fausse',  compact('etape', 'lien'));

    }
}
