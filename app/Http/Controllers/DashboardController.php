<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all registrations
        $registrations = Registration::all();
        return view('dashboard', compact('registrations'));
    }

    public function show($id)
    {
        // View a single registration
        $registration = Registration::findOrFail($id);
        return view('view', compact('registration'));
    }

    public function edit($id)
    {
        // Edit a registration
        $registration = Registration::findOrFail($id);
        return view('edit', compact('registration'));
    }

    public function update(Request $request, $id)
    {
        // Update the registration details
        $registration = Registration::findOrFail($id);
        $registration->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Registration updated successfully.');
    }

    public function destroy($id)
    {
        // Delete a registration
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return redirect()->route('dashboard')->with('success', 'Registration deleted successfully.');
    }

    public function updateStatus($id)
    {
        // Toggle status between 'Pending' and 'Completed'
        $registration = Registration::findOrFail($id);
        $registration->status = $registration->status === 'Pending' ? 'Completed' : 'Pending';
        $registration->save();

        return redirect()->route('dashboard')->with('success', 'Status updated successfully.');
    }
}
