<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Version;
use Illuminate\Support\Facades\Auth;

class VersionController extends Controller
{
    public function findAll()
    {
        return Version::all();
    }

    public function find(Request $request)
    {
        return Version::find($request->version_id);
    }

    public function create(Request $request)
    {
        $version = new Version();
        $version->libelle = $request->libelle;
        $version->numero = $request->numero;
        $version->save();
        return redirect()->route('versions');
    }

    public function update(Request $request)
    {
        $version = Version::find($request->version_id);
        $version->libelle = $request->libelle;
        $version->numero = $request->numero;
        $version->update();
        return redirect()->route('versions');
    }

    public function showVersions()
    {
        $user = Auth::user();
        $versions = Version::all();
        return view('auth.administration.version', ['user' => $user, 'versions' => $versions]);
    }

    public function delete(Request $request)
    {
        $allergie = Version::find($request->version_id);
        $allergie->delete();
        return redirect()->route('versions');
    }

    public function getLastVersion()
    {
        return Version::latest()->first();
    }
}
