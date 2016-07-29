<?php

namespace App\Http\Controllers;
use Auth;
use App\user;
use App\Score;
use App\Scenario;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Http\Requests;

class ScoreController extends Controller
{
    function cmp($a, $b)
    {
        return strcmp($a->getScore(), $b->getScore());
    }
    // permet d'afficher le classement des joueurs
    public function classement(){
        $users = user::where('active', '=', '1')->get();
        $scoreObtenu = array();
        foreach($users as $index => $user) {
            $user->setScore(Score::scoreByUser($user->id)->sum('points'));
        }
        $users = $users->sortByDesc('score');
        $scoreMax = Scenario::MaxPoints();
        return view('score/index', compact('lava', 'users', 'scoreMax'));
    }

    // créer les statistique d'un joueur et les affiches
    public function index($id){
        $scenarios = Scenario::orderBy('id')->get();
        $nbScenarios = $scenarios->count();
        $nom = User::findorFail($id)->name;
        $lava = new Lavacharts;

        $scores = Score::ScoreByUser($id);
        $nbScore = $scores->count();
        // on test si il n'y pas de nouveau scénario
        if ($nbScore != $nbScenarios)
        {
            foreach($scenarios as $index => $scenario) {
                if ($nbScore < $index + 1) {
                    Score::create(['users_id' => $id, 'scenarios_id' => $scenario->id, 'points' => 0]);
                }
            }
        }

        foreach($scenarios as $index => $scenario)
        {
            $score[$index] = \Lava::DataTable();
            $pointsScenario = Score::score($id, $scenario->id)->points;
            $score[$index]->addStringColumn('Raison')
                ->addNumberColumn('Percent')
                ->addRow(['Points obtenus', $pointsScenario])
                ->addRow(['Points manquants', $scenario->pts_max - $pointsScenario]);
            \LAVA::DonutChart('Scenario'.$scenario->id, $score[$index], [
                'title' => 'Score scénario ' .$scenario->nom . ' :'
            ]);
        }
        $test = \Lava::DataTable();
        $scoreObtenu = Score::scoreByUser($id)->sum('points');
        $scoreMax = Scenario::MaxPoints();

        $test->addStringColumn('Raison')
            ->addNumberColumn('Percent')
            ->addRow(['Points obtenus', $scoreObtenu])
            ->addRow(['Points manquants', $scoreMax-$scoreObtenu]);

        \LAVA::DonutChart('total', $test, [
            'title' => 'Score total obtenu :'
        ]);
        $total = 'total';
        return view('score/statistique', compact('lava', 'nom', 'scoreObtenu', 'scoreMax', 'scenarios', 'total'));
    }
}
