<?php

namespace App\Http\Controllers;

use App\Models\ProjectsAwards;

class AwardsController extends Controller
{
    public function index()
    {
        $awards = ProjectsAwards::detailed()->get()->reduce(function($carry, $row){
            if (!isset($carry[$row->year])) {
                $carry[$row->year] = [];
            }
            $carry[$row->year][] = $row;
            return $carry;
        }, []);

        return view('awards', compact('awards'));
    }
}


