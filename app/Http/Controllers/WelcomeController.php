<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $visits = Visit::all(['name', 'email', 'latitude', 'longitude']);
        return inertia('Welcome', ['visits' => $visits]);
    }
}
