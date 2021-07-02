<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Passport\Authenticator as PassportAuthenticator;
use App\Models\Passport\PassportClient;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function PositionGPS(Request $request)
    {
        $user = User::find($request->user_id);

        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;
        $user->update();
        return response("Position utilisateur: " . $user->latitude . "," . $user->longitude);
    }
}
