<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function showForm(Request $request)
    {
        $step = $request->session()->get('current_step', 1); // Default to step 1
        return view('pendaftaran', ['step' => $step]);
    }

    public function postStep1(Request $request)
    {
        $validatedData = $request->validate([
            'namaLengkap' => 'required|string|max:255',
            'jenisKelamin' => 'required|string',
            'tempatLahir' => 'required|string|max:255',
            'tanggalLahir' => 'required|date',
            'tinggi' => 'required|numeric',
            'berat' => 'required|numeric',
            'anakke' => 'required|numeric',
            'jumlahSaudaraKandung' => 'required|numeric',
            'jumlahSaudaraTiri' => 'nullable|numeric',
            'jumlahSaudaraAngkat' => 'nullable|numeric',
            'bahasa' => 'required|string|max:255',
            'alamatAnak' => 'required|string|max:255',
            'nik' => 'required|digits:16',
            'nomorKK' => 'required|digits:16',
            'noRegisAkta' => 'required|string|max:255',
            'jarak' => 'required|string|max:255',
            'tempatTinggal' => 'required|string',
            'transportasi' => 'required|array',
        ]);

        // Store step 1 data in the session
        $request->session()->put('step1', $validatedData);

        return redirect()->route('step2');
    }

    public function postStep2(Request $request)
    {
        $validatedData = $request->validate([
            'namaLengkapAyah' => 'required|string|max:255',
            'nikAyah' => 'required|digits:16',
            'namaLengkapIbu' => 'required|string|max:255',
            'nikIbu' => 'required|digits:16',
            'tempatLahirA' => 'required|string|max:255',
            'tanggalLahirA' => 'required|date',
            'tempatLahirI' => 'required|string|max:255',
            'tanggalLahirI' => 'required|date',
            'alamatOrtu' => 'required|string|max:255',
            'kodeposOrtu' => 'required|numeric',
            'notelpOrtu' => 'required|string|max:15',
            'kantorAyah' => 'required|string|max:255',
            'kantorIbu' => 'required|string|max:255',
            'nohpAyah' => 'required|string|max:15',
            'nohpIbu' => 'required|string|max:15',
            'statusAyah' => 'required|string',
            'statusIbu' => 'required|string',
            'pendidikanAyah' => 'required|string',
            'pendidikanIbu' => 'required|string',
            'pekerjaanAyah' => 'required|string',
            'pekerjaanIbu' => 'required|string',
            'penghasilanAyah' => 'required|string',
            'penghasilanIbu' => 'required|string',
            'jumlahtanggungan' => 'required|numeric',
        ]);

        // Store step 2 data in the session
        $request->session()->put('step2', $validatedData);

        return redirect()->route('step3');
    }

    public function postStep3(Request $request)
    {
        $validatedData = $request->validate([
            'namaWali' => 'nullable|string|max:255',
            'tempatLahirWali' => 'nullable|string|max:255',
            'tanggalLahirWali' => 'nullable|date',
            'pendidikanWali' => 'nullable|string',
            'hubunganMuridWali' => 'nullable|string',
            'tanggunganWali' => 'nullable|string',
            'alamatWali' => 'nullable|string|max:255',
            'kodeposWali' => 'nullable|numeric',
            'teleponWali' => 'nullable|string|max:15',
            'alamatKantorWali' => 'nullable|string|max:255',
        ]);

        // Store step 3 data in the session
        $request->session()->put('step3', $validatedData);

        // Combine all data from the session into one array
        $allData = array_merge(
            $request->session()->get('step1'),
            $request->session()->get('step2'),
            $request->session()->get('step3')
        );

        // Save the data into the database
        Registration::create($allData);

        // Clear the session data
        $request->session()->forget(['step1', 'step2', 'step3']);

        return redirect()->route('successPage'); // Redirect to a success page
    }
}
