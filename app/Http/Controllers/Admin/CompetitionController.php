<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Competition;
use App\Models\Admin\LeagueTable;
use App\Models\Admin\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompetitionController extends Controller
{
    public function index()
    {



        return view('competitions.index', [
            'competitions' => DB::table('competitions')->get()
        ]);
    }

    public function add(Request $request)
    {

        if (isset($request['level'])) {
            return view('competitions.add', [
                'teams' => DB::table('teams')->where('league', $request['league'])->where('level', $request['level'])->pluck('name')
            ]);
        }

        return view('competitions.add');
    }

    public function store(Request $request)
    {

        $competitionID = DB::table('competitions')->insertGetId(
            [
                'start' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        foreach ($request['pickedTeams'] as $teamName) {
            DB::table('league_tables')->insert([
                'teamName' => $teamName,
                'competitionID' => $competitionID
            ]);
        }

        return redirect(
            route(
                'competitions.show',
                [
                    'id' => $competitionID
                    //'competitions' => DB::table('league_tables')->where('competitionID', $competitionID)->get()
                ]
            )
        );
    }

    public function show(Request $request, int $id)
    {


        return  view('leagueTables.show', ['teams' => DB::table('league_tables')->where('competitionID', $id)->get()]);
    }

    /*   public function show($competitions)
    {
        foreach ($competitions as $competition)
        {
            return $competition;
        }
    } */
}
