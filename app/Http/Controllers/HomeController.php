<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function frontValidation()
    {
        $characters = Http::get('https://rickandmortyapi.com/api/character')->json()['results'];
        return view('front-validation', ['characters' => $characters]);
    }
}
?>

