<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\GameImport;


class ImportExcelController extends Controller
{
    function index()
    {
        $data = DB::table('games')->orderBy('id', 'DESC')->get();

        return view('test', ['data' => $data]);
    }

    public function import() 
    {
        Excel::import(new GameImport, request()->file('select_file'));
        
        return redirect('/import_excel')->with('success', 'All good!');
    }

    /* function import(Request $request)
    {
        $this->validate($request, [
            'select_file' => 'required|mimes:xls,xlsx'
        ]);

        $path =  $request->file('select_file')->getRealPath();

        $data = Excel::load($path)->get(); // this not working, it's przestarzałe!

        if($data->count() > 0)
        {
            foreach($data->toArray() as $key => $value)
            {
                foreach($value as $row)
                {
                    $insert_data = [
                        'hosts' => $row['hosts'],
                        'visitors' => $row['visitors'],
                        'hosts_goals' => $row['hosts_goals'],
                        'visitors_goals' => $row['visitors_goals'],
                        'group' => $row['group'],
                        'pitch' => $row['pitch'],
                        'date' => $row['date'],
                        'hour' => $row['hour']
                    ];
                }
            }

            if(!empty($insert_data))
            {
                DB::table('fixtures')->insert($insert_data);
            }

            return back()->with('success', 'Udało się!');
        }
    } */
}
