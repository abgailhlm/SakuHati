<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class GslcController extends Controller
{
    public function index()
    {
        //Median
        $numbers = collect([10, 20, 30, 40, 50]);
        $median = $numbers->median(); // (30)

        // Concat
        $collectionA = collect(['Laravel', 'PHP']);
        $collectionB = collect(['MySQL', 'JavaScript']);

        $concatResult = $collectionA->concat($collectionB);


        // Contains
        $fruits = collect(['Apple', 'Banana', 'Orange', 'Mango']);
        $containsApple = $fruits->contains('Apple');      // true
        $containsGrape = $fruits->contains('Grape');      // false

        return view('gslc', [
            'numbers'        => $numbers,
            'median'         => $median,
            'collectionA'    => $collectionA,
            'collectionB'    => $collectionB,
            'concatResult'   => $concatResult,
            'fruits'         => $fruits,
            'containsApple'  => $containsApple,
            'containsGrape'  => $containsGrape,
        ]);
    }
}
