<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Intervention;
use App\Models\RayonIntervention;
use App\Models\StatutIntervention;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class InterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return response($interventions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $intervention = Intervention::create(
            [
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'user_id' => $request->user_id,
                'type_intervention_id' => $request->type_intervention_id,
            ]
        );
        return response($intervention);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banque  $banque
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(Intervention::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banque  $banque
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banque  $banque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $intervention = StatutIntervention::create([
            'user_id' => $request->user_id,
            'intervention_id' => $request->intervention_id,
            'intervention_ack' => $request->intervention_ack,
            'debut_intervention_at' => Carbon::now(),
        ]);
        $intervention = Intervention::find($request->intervention_id)->update([
            'nb_intervenant' => Intervention::find($request->intervention_id)->nb_internant + 1,
        ]);
        return response(Intervention::find($request->intervention_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banque  $banque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $status = StatutIntervention::where('intervention_id', $request->intervention_id)->get();
        foreach ($status as $stat) {
            $stat->delete();
        }
        return response(Intervention::find($request->intervention_id)->delete());
    }

    public function finIntervention(Request $request)
    {
        $intervention = Intervention::find($request->intervention_id)->update([
            'fin_intervention_at' => Carbon::now(),
        ]);
        return response(Intervention::find($request->intervention_id));
    }
}
