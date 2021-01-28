<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeagueTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'photoPath', 'photoName', 'league'
    ];

}
