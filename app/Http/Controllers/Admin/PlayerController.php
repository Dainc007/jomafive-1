<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function players(int $id)
    {
        return view('teams.player', [
            'players' => DB::table('players')->orderBy('id', 'DESC')->limit(20)->get(),
            'juniors' => DB::table('junior_players')->orderBy('id', 'DESC')->limit(20)->get(),
            'showPlayer' => DB::table('players')->where('id', $id)->get(),
            'showJunior' => DB::table('junior_players')->where('id', $id)->get()
        ]);
    }

    public function managers(int $id)
    {
        return view('teams.manager',[
            'managers' => DB::table('managers')->orderBy('id', 'DESC')->limit(10)->get(),
            'showManager' => DB::table('managers')->where('id', $id)->get(),
        ]);
    }

    public function transferList()
    {
        return view('teams.transferList');
    }

    public function add(Request $request)
    {
        $player = Player::create($request->all());
    
    }
}
