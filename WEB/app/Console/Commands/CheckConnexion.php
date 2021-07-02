<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckConnexion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkConnexion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vérifie si un utilisateur est connecté';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sessions = Session::all();
        $users = User::all();
        foreach($users as $user)
        {
            $user->connected = false;
            $user->save();
        }
        foreach($sessions as $session)
        {
            foreach($users as $user)
            {
                if($session->user_id == $user->id)
                {
                    $user->connected = true;
                    $user->save();
                }
            }
        }
        return true;
    }
}
