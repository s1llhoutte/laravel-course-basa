<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Post;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index() {
        $pet = Pet::find(1);
        dd($pet);
    }
}
