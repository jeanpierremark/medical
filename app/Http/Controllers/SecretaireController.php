<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecretaireController extends Controller
{
    public function index(){
        return view('secretaire.dashboard');
    }
}
