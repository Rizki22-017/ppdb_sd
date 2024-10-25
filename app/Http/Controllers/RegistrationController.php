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
        // **1. Validate Parent Data, Tanggungan Data, Kawasan Tinggal, and Status Tempat Tinggal**
        $validatedData = $request->validate([
            // Parent Data
            'nama_lengkap_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|digits:16|nikAyah',
            'nama_lengkap_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|digits:16|nikIbu',
            'status_ayah' => 'required|string|max:255',
            'status_ibu' => 'required|date',
            'tempat_lahir_ayah' => 'required|string|max:255',
            'tanggal_lahir_ayah' => 'required|date',
            'tempat_lahir_ibu' => 'required|string|max:255',
            'tanggal_lahir_ibu' => 'required|numeric',


            'alamat_ortu' => 'required|string|max:15',
            'kode_pos_ortu' => 'required|string|max:255',
            'no_telp_ortu' => 'required|string|max:255',
            'kantor_ayah' => 'required|string|max:15',
            'kantor_ibu' => 'required|string|max:15',
            'no_hp_ayah' => 'required|string',
            'no_hp_ibu' => 'required|string',
            'kawasan_tinggal' => 'required|string',
            'status_tempat_tinggal' => 'required|string',
            'pendidikan_ayah' => 'required|string',


            'pendidikan_ayah_lain' => 'nullable|string|max:255',
            'pendidikan_ibu' => 'required|string',
            'pendidikan_ibu_lain' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'required|string',
            'pekerjaan_ayah_detail' => 'required|string',
            'pekerjaan_ibu' => 'required|string',
            'pekerjaan_ibu_detail' => 'required|string',
            'penghasilan_ayah' => 'required|string',
            'penghasilan_ibu' => 'required|string',


            // Tanggungan Data
            'jumlah_tanggungan' => 'required|string',
            'tanggungan' => 'nullable|array',
            'tanggungan.*.nama_lengkap_tanggungan' => 'nullable|string|max:255',
            'tanggungan.*.sekolah_tanggungan' => 'nullable|string|max:255',
            'tanggungan.*.kelas_tanggungan' => 'nullable|string|max:50',
            'tanggungan.*.uang_sekolah_tanggungan' => 'nullable|numeric',
            'tanggungan.*.keterangan_tanggungan' => 'nullable|string|max:255',
        ]);

        // **2. Store Parent Data in Registrations Table**
        $parentData = $request->except('tanggungan'); // Exclude tanggungan data

        // Ensure that only valid fields are passed into the create method
        $registration = Registration::create($parentData);
        $request->session()->put('step2', $validatedData);


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
            'nama_wali' => 'nullable|string|max:255',
            'tempat_lahir_wali' => 'nullable|string|max:255',
            'tanggal_lahir_wali' => 'nullable|date',
            'pendidikan_wali' => 'nullable|string',
            'pendidikan_wali_lain' => 'nullable|string',
            'hubungan_murid_wali' => 'nullable|string',
            'hubungan_murid_wali_lain' => 'nullable|string',
            'tanggungan_wali' => 'nullable|string',
            'tanggungan_wali_lain' => 'nullable|string',
            'alamat_wali' => 'nullable|string|max:255',
            'kodepos_wali' => 'nullable|numeric',
            'telepon_wali' => 'nullable|string|max:15',
            'alamat_kantor_wali' => 'nullable|string|max:255',
        ]);

        $allData = array_merge(
            $request->session()->get('step1', []),
            $request->session()->get('step2', []),
            $validatedData
        );

        dd($request->all());
        // Save the merged data to the Registration model
        Registration::create($allData);

        // Clear the session data for the steps
        $request->session()->forget(['step1', 'step2', 'step3']);

        // Redirect to the success page
        return redirect()->route('successPage');
    }
}
