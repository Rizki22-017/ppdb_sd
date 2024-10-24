<?php

namespace App\Http\Controllers;

use App\Models\Registration;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch registrations from the database
        $registrations = Registration::all();

        // Pass the data to the view
        return view('dashboard', compact('registrations'));
    }
}