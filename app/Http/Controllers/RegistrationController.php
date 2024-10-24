<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function showForm(Request $request)
    {
        $step = $request->session()->get('current_step', 1); // Default to step 1

        // Ensure the user follows the correct order
        if ($step === 2 && !$request->session()->has('step1')) {
            return redirect()->route('pendaftaran')->withErrors('Please complete Step 1 first.');
        }
        if ($step === 3 && !$request->session()->has('step2')) {
            return redirect()->route('pendaftaran')->withErrors('Please complete Step 2 first.');
        }

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


    public function showStep2()
    {
        return view('step.step2'); // Render Step 2 view
    }

    public function postStep2(Request $request)
    {
        // **1. Validate Parent Data and Tanggungan Data**
        $validatedData = $request->validate([
            // Parent Data
            'namaLengkapAyah' => 'required|string|max:255',
            'nikAyah' => 'required|digits:16|unique:registrations,nikAyah',
            'namaLengkapIbu' => 'required|string|max:255',
            'nikIbu' => 'required|digits:16|unique:registrations,nikIbu',
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

            // Tanggungan Data
            'tanggungan' => 'nullable|array',
            'tanggungan.*.namaLengkap' => 'nullable|string|max:255',
            'tanggungan.*.sekolah' => 'nullable|string|max:255',
            'tanggungan.*.kelas' => 'nullable|string|max:50',
            'tanggungan.*.uangSekolah' => 'nullable|numeric',
            'tanggungan.*.keterangan' => 'nullable|string|max:255',
        ]);

        // **2. Store Parent Data in Registrations Table**
        $parentData = $request->except('tanggungan'); // Exclude tanggungan data
        $registration = Registration::create($parentData);

        // **3. Store Tanggungan Data in Tanggungans Table (if any)**
        if ($request->has('tanggungan')) {
            foreach ($request->input('tanggungan') as $tanggunganData) {
                // Ensure 'registration_id' is associated with the current registration
                $registration->tanggungan()->create($tanggunganData);
            }
        }

        // **4. Redirect to Step 3**
        return redirect()->route('step3');
    }

    public function showStep3()
    {
        return view('step.step3'); // Render Step 3 view
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

        // Debugging step
        dd($validatedData); // This will show if data from step3 is correctly captured

        $allData = array_merge(
            $request->session()->get('step1', []),
            $request->session()->get('step2', []),
            $validatedData
        );

        // Save the merged data
        Registration::create($allData);

        $request->session()->forget(['step1', 'step2', 'step3']);
        return redirect()->route('successPage');
    }
}