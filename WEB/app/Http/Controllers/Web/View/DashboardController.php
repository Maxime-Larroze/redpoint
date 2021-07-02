<?php

namespace App\Http\Controllers\Web\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Intervention;
use App\Models\TypeIntervention;
use App\Models\StatutIntervention;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        $Date30j = Carbon::now();
        $Date30j->subDays(30);
        $user = Auth::user();
        $StatutInterventions = StatutIntervention::where('user_id', '=', Auth::user()->id)->get();
        $Interventions30j = StatutIntervention::where('user_id', '=', Auth::user()->id)->where('fin_intervention_at', '>=', $Date30j)->get();
        $Interventions = Intervention::all();
        $TypeInterventions = TypeIntervention::all();

        $dateNow = Carbon::now();
        for ($i = 0; $i < 30; $i++) {
            $interval30j = Carbon::now();
            $interval30j->subDays($i);
            $interventions_dates[$i] = date('d-m-Y', strtotime($interval30j));
            $interventions_tb[$i] = 0;
            foreach ($StatutInterventions as $statutIntervention) {
                if (date('d-m-Y', strtotime($statutIntervention->fin_intervention_at)) == date('d-m-Y', strtotime($interventions_dates[$i]))) {
                    $interventions_tb[$i]++;
                }
            }
        }

        $j = 0;
        foreach ($TypeInterventions as $typeIntervention) {
            $i = 0;
            foreach ($Interventions as $intervention) {
                foreach ($StatutInterventions as $statutIntervention) {
                    if ($intervention->id === $statutIntervention->intervention_id && $intervention->type_intervention_id === $typeIntervention->id) {
                        $i++;
                    }
                }
            }
            $type_tb[$j] = $i;
            $j++;
        }
        return view('auth.dashboard.interface', ['user' => $user, 'typeInterventions' => $TypeInterventions, 'interventions30j' => $Interventions30j, 'interventions' => $Interventions, 'statutInterventions' => $StatutInterventions, 'interventions_tb' => $interventions_tb, 'type_tb' => $type_tb]);
    }

    public function showMap()
    {
        $user = Auth::user();
        if (!empty($user->latitude)) {
            $interventions = app('App\Http\Controllers\Web\InterventionController')->index($user->latitude, $user->longitude, $user->id);
        } else {
            $interventions = null;
        }
        $typeinterventions = TypeIntervention::all();
        return view('auth.map.interface', ['user' => $user, 'interventions' => $interventions, 'typeinterventions' => $typeinterventions]);
    }
}
