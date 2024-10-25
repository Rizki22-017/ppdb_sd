<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Log;

class RegistrationController extends Controller
{
    // Step 1: Display the form for Step 1
    public function showStep1()
    {
        $registration = Registration::where('user_id', auth()->id())->first();
        return view('pendaftaran', ['step' => 1, 'registration' => $registration]);
    }

    // Step 1: Handle POST for Step 1
    public function postStep1(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tinggi' => 'required|numeric',
            'berat' => 'required|numeric',
            'anak_ke' => 'required|numeric',
            'jumlah_saudara_kandung' => 'required|numeric',
            'jumlah_saudara_tiri' => 'nullable|numeric',
            'jumlah_saudara_angkat' => 'nullable|numeric',
            'bahasa' => 'required|string|max:255',
            'alamat_anak' => 'required|string|max:255',
            'nik' => 'required|digits:16',
            'nomor_kk' => 'required|digits:16',
            'no_regis_akta' => 'required|string|max:255',
            'jarak' => 'required|string|max:255',
            'tempat_tinggal' => 'required|string',
            'transportasi' => 'required|array',
        ]);

        Log::info('Validated Step 1 data:', $validatedData);


        // Create or update the registration record
        $registration = Registration::updateOrCreate(
            ['user_id' => auth()->id()],  // Find by user_id
            array_merge($validatedData, ['user_id' => auth()->id()]) // Ensure user_id is included
        );

        return redirect()->route('step2.show');
    }

    // Step 2: Show the form for Step 2
    public function showStep2()
    {
        $registration = Registration::where('user_id', auth()->id())->first();
        return view('pendaftaran', ['step' => 2, 'registration' => $registration]);
    }

    // Step 2: Handle POST for Step 2
    public function postStep2(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|digits:16',
            'nama_lengkap_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|digits:16',
            'status_ayah' => 'required|string|max:255',
            'status_ibu' => 'required|string|max:255',
            'tempat_lahir_ayah' => 'required|string|max:255',
            'tanggal_lahir_ayah' => 'required|date',
            'tempat_lahir_ibu' => 'required|string|max:255',
            'tanggal_lahir_ibu' => 'required|date',
            'alamat_ortu' => 'required|string|max:255',
            'kode_pos_ortu' => 'required|string|max:10',
            'no_telp_ortu' => 'required|string|max:15',
            'kantor_ayah' => 'nullable|string|max:255',
            'kantor_ibu' => 'nullable|string|max:255',
            'no_hp_ayah' => 'required|string|max:15',
            'no_hp_ibu' => 'required|string|max:15',
            'kawasan_tinggal' => 'required|string|max:255',
            'status_tempat_tinggal' => 'required|string|max:255',
            'pendidikan_ayah' => 'required|string|max:255',
            'pendidikan_ibu' => 'required|string|max:255',
        ]);

        $registration = Registration::where('user_id', auth()->id())->first();
        $registration->update($validatedData);

        return redirect()->route('step3.show');
    }

    // Step 3: Show the form for Step 3
    public function showStep3()
    {
        $registration = Registration::where('user_id', auth()->id())->first();
        return view('pendaftaran', ['step' => 3, 'registration' => $registration]);
    }

    // Step 3: Handle POST for Step 3
    public function postStep3(Request $request)
    {
        $validatedData = $request->validate([
            'nama_wali' => 'nullable|string|max:255',
            'tempat_lahir_wali' => 'nullable|string|max:255',
            'tanggal_lahir_wali' => 'nullable|date',
            'pendidikan_wali' => 'nullable|string|max:255',
            'hubungan_murid_wali' => 'nullable|string|max:255',
            'alamat_wali' => 'nullable|string|max:255',
            'kodepos_wali' => 'nullable|string|max:10',
            'telepon_wali' => 'nullable|string|max:15',
            'alamat_kantor_wali' => 'nullable|string|max:255',
        ]);

        $registration = Registration::where('user_id', auth()->id())->first();
        $registration->update($validatedData);

        return redirect()->route('successPage');
    }

    // Success page after completing registration
    public function success()
    {
        return view('success');
    }
}
