<?php

namespace App\Imports;

use App\Game;
use App\Models\Game as ModelsGame;
use Maatwebsite\Excel\Concerns\ToModel;

class GameImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ModelsGame([

            'hosts' => $row[1],
            'visitors' => $row[2],
            'hosts_goals' => $row[3],
            'visitors_goals' => $row[4],
            'group' => $row[5],
            'pitch' => $row[6],
            'date' => $row[7],
            'hour' => $row[8],

        ]);
    }
}
