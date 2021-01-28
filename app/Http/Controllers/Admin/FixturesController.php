<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FixturesController extends Controller
{
    public function add()
    {
        return view('fixtures.add');
    }

    public function store(Request $request)
    {   

        $teams = DB::table('league_tables')->where('competitionID', $request['competition'])->pluck('teamName');



        return ['teams' => $teams , 'request' => $request->all()];
    }

    public function edit()
    {

    }

    public function delete()
    {

    }

    public function show()
    {

    }
}
