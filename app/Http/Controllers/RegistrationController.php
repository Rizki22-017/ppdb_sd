<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;


class RegistrationController extends Controller
{
    // Example in showStep1, apply similar logic to showStep2 and showStep3 if needed
    public function showStep1($id = null)
    {
        if ($id != null) {
            $data['register'] = Registration::where('user_id', auth()->id())->first();
        }
        $data['step'] = 1;
        // Retrieve registration or return a new instance with default values
        // $registration = Registration::where('user_id', auth()->id())->first() ?? new Registration(['user_id' => auth()->id()]);
        return view('pendaftaran', $data);
    }


    // Step 1: Handle POST for Step 1
    public function postStep1(Request $request, $register_id = null)
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

        // Create or update registration entry
        if ($register_id != null) {
            $registration = Registration::updateOrCreate(
                ['id' => $register_id],
                array_merge($validatedData, ['user_id' => auth()->id()])
            );
        } else {
            $registration = Registration::updateOrCreate(array_merge($validatedData, ['user_id' => auth()->id()]));
        }

        // Redirect to Step 2, passing the user_id
        return redirect()->route('step2.show', ['form_id' => $registration->id]);
    }

    // Step 2: Show the form for Step 2
    public function showStep2($register_id)
    {
        $data['register_id'] = $register_id;
        $data['step'] = 3;
        $data['register'] = Registration::where('id', $register_id)->first();

        return view('pendaftaran', $data);
    }


    // Step 2: Handle POST for Step 2
    public function postStep2(Request $request, $register_id)
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

        $registration = Registration::where('id', $register_id)->updateOrCreate($validatedData);

        return redirect()->route('step3.show', ['register_id' => $register_id]);
    }

    // Step 3: Show the form for Step 3
    public function showStep3($register_id)
    {
        $data['register_id'] = $register_id;
        $data['step'] = 3;
        $data['register'] = Registration::where('id', $register_id)->first();

        return view('pendaftaran', $data);
    }

    // Step 3: Handle POST for Step 3
    public function postStep3(Request $request, $register_id)
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

        $registration = Registration::where('id', $register_id)->updateOrCreate($validatedData);

        return redirect()->route('successPage');
    }

    // Success page after completing registration
    public function success()
    {
        return view('success');
    }
}
