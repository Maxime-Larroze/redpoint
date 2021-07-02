<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DossierMedical;
use App\Models\User;
use Illuminate\Http\Request;

class DossierMedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!empty(DossierMedical::find(User::find($request->user_id)->dossier_id)) && DossierMedical::find(User::find($request->user_id)->dossier_id) != null) {
            return response(DossierMedical::find(User::find($request->user_id)->dossier_id));
        }
        $dossier = new DossierMedical();
        $tmp = $dossier::create([
            'sport' => $request->sport,
            'commentaire' => $request->commentaire,
            'groupe_sanguin_id' => $request->groupe_sanguin_id,
        ]);
        User::find($request->user_id)->update([
            'dossier_id' => $tmp->id
        ]);

        return response(DossierMedical::find($tmp->id));
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
        return response(DossierMedical::where('user_id', $id)->first());
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
        DossierMedical::find($request->dossier_id)->update([
            'sport' => $request->sport,
            'commentaire' => $request->commentaire,
            'groupe_sanguin_id' => $request->groupe_sanguin_id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banque  $banque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return response(DossierMedical::find($request->dossier_id)->delete());
    }
}
