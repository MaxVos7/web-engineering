<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieInfoController extends Controller
{
    function stats_standard_deviation(array $a, $sample = false) {
        $n = count($a);
        if ($n === 0) {
            trigger_error("The array has zero elements", E_USER_WARNING);
            return false;
        }
        if ($sample && $n === 1) {
            trigger_error("The array has only 1 element", E_USER_WARNING);
            return false;
        }
        $mean = array_sum($a) / $n;
        $carry = 0.0;
        foreach ($a as $val) {
            $d = ((double) $val) - $mean;
            $carry += $d * $d;
        };
        if ($sample) {
            --$n;
        }
        return sqrt($carry / $n);
    }

// Endpoint 5
    public function show1 (Request $request)
    {
        $query = Movie::query();

        $query->select('users_rating');

        if ($request->get('actor')) {
            $query->where('actors', 'like', "%" . $request->get('actor') . "%");
        } else {
            abort(404);
        }
        if ($request->get('year')) {
            $query->where('year', $request->get('year'));
        }
        $query->orderBy('users_rating');

        $nRows = $query->count();
        $mean = $query->avg('users_rating');


        foreach ($query->get() as $q){
            $array[] = $q->users_rating;
        }
        $stddev = $this->stats_standard_deviation($array);

        if ($nRows % 2 == 1) {
            $median = $query->skip($nRows/2)->take(1)->value('users_rating');
        } else {
            $first = $query->skip($nRows/2)->take(1)->value('users_rating');
            $second = $query->skip($nRows/2 +1)->take(1)->value('users_rating');
            $median = ($first + $second) / 2;
        }

        return $stddev;


//        THIS ACCESSES THE WRONG DATABASE!!!!!!!
//        return view('movieInfo', [
//            'movies' => \DB::select("SELECT * FROM movies2 WHERE slug = '$slug_or_URL' or imdb_url = 'https://www.imdb.com/title/$slug_or_URL/'")
//        ]);
    }

// Endpoint 2
    public function show ($slug_or_URL)
    {
        $query = Movie::query();
        $query->where('imdb_url', '=', 'https://www.imdb.com/title/' . $slug_or_URL . '/')
            ->orWhere('slug', '=', $slug_or_URL);
        return $query->get();


//        THIS ACCESSES THE WRONG DATABASE!!!!!!!
//        return view('movieInfo', [
//            'movies' => \DB::select("SELECT * FROM movies2 WHERE slug = '$slug_or_URL' or imdb_url = 'https://www.imdb.com/title/$slug_or_URL/'")
//        ]);
    }

// Endpoint 3
    public function index (Request $request)
    {
        $query = Movie::query();

        if ($request->get('title')) {
            $query->where('title', 'like', "%" . $request->get('title') . "%");
        }
        if ($request->get('actor')) {
            $query->where('actors', 'like', "%" . $request->get('actor') . "%");
        }
        if ($request->get('director')) {
            $query->where('directors', 'like', "%" . $request->get('director') . "%");
        }
        if ($request->get('year')) {
            $query->where('year', $request->get('year'));
        }
        if ($request->get('per_page')) {
            // Supposed to be just a variable i think
            $per_page = $request->get('per_page');
        }
        return $query->get();


//        return view('stud_view', [
//            'users' => $movies
//        ]);
    }

// Endpoint 4
    public function index1 (Request $request)
    {
        $query = Movie::query();

        if ($request->get('year')) {
            $query->where('year', $request->get('year'));
        }
        if ($request->get('subset_size')) {
            $query->limit($request->get('subset_size'));
        }
        if ($request->get('sort_type') == 'asc') {
            $query->orderBy('users_rating');
        } else {
            $query->orderByDesc('users_rating');
        }
        if ($request->get('per_page')) {
            // Supposed to be just a variable i think
            $per_page = $request->get('per_page');
        }
        return $query->get();


//        return view('stud_view', [
//            'users' => $movies
//        ]);
    }

// Endpoint 1
    public function index2 (Request $request)
    {
        $query = Movie::query();
// WE STILL NEED A DATASET BEING ALL THE ACTORS

        $query->limit(1);


        $query->select('actors');
        $array = $query->get();
//        print_r($array);
//        foreach ($array as $key => $value) {
//            echo "{$key} => {$value} ";
//        }
//        $actors = json_decode($query->get());
//        print_r($actors);


//        if ($request->get('sorted')) {
//            $query->orderBy('full name');
//        }
//        if ($request->get('per_page')) {
//            // Supposed to be just a variable i think
//            $per_page = $request->get('per_page');
//        }
        return $array;

//        return view('stud_view', [
//            'users' => $movies
//        ]);
    }

}
