<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Manager;
use App\Models\Admin\Player;
use App\Models\Admin\Team;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TeamController extends Controller
{

    public function index()
    {
        return  view('teams.index', [
            'allTeams' => DB::table('teams')->orderBy('league', 'ASC')->orderBy('level', 'ASC')->get(),
            'allJuniorTeams' => DB::table('junior_teams')->orderBy('class', 'ASC')->orderBy('level', 'ASC')->get(),
        ]);
    }


    public function add(Request $request)
    {
        if (isset($request['numberOfPlayers'])) {
            return view('teams.add', [
                'numberOfPlayers' => $request['numberOfPlayers']
            ]);
        }

        return view('teams.add');
    }


    public function store(Request $request)
    {
         if ($request->hasFile('shield')) {

            $fileName =  $request->shield->getClientOriginalName();
            $shieldPath = $request->shield->storeAs('/images/gallery', $fileName);
            $photo = new Photo;
            $photo->name = $fileName;
            $photo->galleryName = 'shields';
            $photo->path = $shieldPath;
            $photo->save();
        }

        if ($request->hasFile('teamPhoto')) {

            $fileName =  $request->teamPhoto->getClientOriginalName();
            $teamPhotoPath = $request->teamPhoto->storeAs('/images/gallery', $fileName);
            $photo = new Photo;
            $photo->name = $fileName;
            $photo->galleryName = 'teamPhoto';
            $photo->path = $teamPhotoPath;
            $photo->save();
        }

        if ($request->has('adult')) {
            $teamID = DB::table('teams')->insertGetId([
                'name' => $request['teamName'],
                'league' => $request['league'],
                'level' => $request['level'],
                'shieldPath' => $shieldPath,
                'teamPhotoPath' => $teamPhotoPath,
            ]);
        }

        if ($request->has('junior')) {

            $teamID = DB::table('junior_teams')->insertGetId([
                'name' => $request['teamName'],
                'league' => $request['league'],
                'level' => $request['level'],
                'shieldPath' => $shieldPath,
                'teamPhotoPath' => $teamPhotoPath,
                'class' => $request['class']

            ]);

            for ($i = 0; $i < count($request['name']);) {

                $x = DB::table('junior_players')->insert([

                    'name' => $request->name[$i],
                    'surname' => $request->surname[$i],
                    'yearOfBirth' => $request->yearOfBirth[$i],
                    'teamName' => $request['teamName'],
                    'teamID' => $teamID
                ]);
                $i++;
            }
        }

        if ($request->has('surname')) {


            for ($i = 0; $i < count($request['name']);) {

                $x = DB::table('players')->insert([

                    'name' => $request->name[$i],
                    'surname' => $request->surname[$i],
                    'yearOfBirth' => $request->yearOfBirth[$i],
                    'teamName' => $request['teamName'],
                    'teamID' => $teamID
                ]);
                $i++;
            }
        } 
        
        if($request->has('managerName')) {

             DB::table('managers')->insert([
                'name' => $request->managerName,
                'surname' => $request->managerSurname,
                'phoneNumber' => $request->phoneNumber,
                'e-mail' => $request->email,
                'teamID' => $teamID,
                'league' => $request->league,
                'created_at' => now(),
                'updated_at' => now()
            ]); 
        }

    }
}
