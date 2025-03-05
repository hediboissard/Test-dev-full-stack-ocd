<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Support\Facades\DB;

class TestParenteController extends Controller
{
    public function testDegree()
    {
        DB::enableQueryLog();
        $timestart = microtime(true);

        $person = Person::findOrFail(84);
        $degree = $person->getDegreeWith(1265);

        var_dump([
            "degree" => $degree, 
            "time" => microtime(true) - $timestart, 
            "nb_queries" => count(DB::getQueryLog())
        ]);
    }
}
