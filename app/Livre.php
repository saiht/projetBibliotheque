<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Livre extends Model
{
    protected $table = 'livre';

    public static function getBestAutor() {
        return DB::table('livre')
            ->select(DB::raw('COUNT(*) as Nb'), 'auteur_id')
            ->groupBy('auteur_id')
            ->orderBy(DB::raw('COUNT(*)'), 'DESC')
            ->first();
    }

    public static function getLastAdded() {
        return self::orderBy('id', 'desc')->first();
    }


}
