<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Intervention;
use App\Models\RayonIntervention;
use App\Models\TypeIntervention;
use App\Models\StatutIntervention;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class InterventionController extends Controller
{
    public function showInterventions()
    {
        $user = Auth::user();
        $StatutInterventions = StatutIntervention::where('user_id', '=', Auth::user()->id)->get();
        $Interventions = Intervention::all();
        $TypeInterventions = TypeIntervention::all();
        return view('auth.intervention.interface', ['user' => $user, 'typeInterventions' => $TypeInterventions, 'interventions' => $Interventions, 'statutInterventions' => $StatutInterventions]);
    }

    public function UpdateCommentaire(Request $request)
    {
        request()->validate([
            'commentaire' => 'required'
        ]);
        $statut = StatutIntervention::find($request->statutintervention_id);
        $statut->commentaire = $request->commentaire;
        $statut->update();
        return redirect()->route('interventions');
    }

    public function index($latitude, $longitude, $id)
    {
        $radius = RayonIntervention::find(User::find($id)->rayon_intervention_id)->rayon;
        $interventions = DB::select('SELECT *,
        6371 * acos (
              cos ( radians(' . $latitude . ') )
              * cos( radians( latitude ) )
              * cos( radians( longitude ) - radians(' . $longitude . ') )
              + sin ( radians(' . $latitude . ') )
              * sin( radians( latitude ) )
        ) AS distance
        FROM interventions
        HAVING DISTANCE < ' . $radius . '
        ORDER BY distance
        LIMIT 0 , 20;');
        return $interventions;
    }
}
