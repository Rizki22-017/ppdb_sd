<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    // Generate a new form ID with the format 001-OL-YYYY
    private function generateFormId()
    {
        $year = date('Y');
        $prefix = '-OL-';

        // Fetch the latest registration record for the current year
        $latestRegistration = Registration::where('form_id', 'LIKE', "%$year")->latest('created_at')->first();

        if ($latestRegistration) {
            // Extract the numeric part of the latest form_id and increment it
            $lastNumber = (int)substr($latestRegistration->form_id, 0, 3);
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            // Start numbering from 001 if no records found for the current year
            $newNumber = '001';
        }

        return $newNumber . $prefix . $year;
    }

    // Show Step 1 form
    public function showStep1()
    {
        $registration = Registration::where('user_id', Auth::id())->first();

        return view('stepone', [
            'registration' => $registration,
            'step' => 1,
        ]);
    }


    // Step 1: Handle POST for Step 1
    public function postStep1(Request $request)
    {
        // Generate a new form ID for new records only if no form ID exists for the user
        $registration = Registration::where('user_id', Auth::id())->first();
        $formId = $registration ? $registration->form_id : $this->generateFormId();

        // Validate incoming request
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
            'nik' => 'required|digits:16|unique:registrations,nik,' . optional($registration)->id,
            'nomor_kk' => 'required|digits:16',
            'no_regis_akta' => 'required|string|max:255',
            'jarak' => 'required|string|max:255',
            'tempat_tinggal' => 'required|string',
            'transportasi' => 'required|array',
            'nama_sekolah_dulu' => 'nullable|string|max:255',
            'nspn_sekolah' => 'nullable|string|max:255',
            'alamat_sekolah_dulu' => 'nullable|string|max:255',
            'desa_sekolah' => 'nullable|string|max:255',
            'kabupaten_sekolah' => 'nullable|string|max:255',
            'nisn' => 'nullable|string|max:255',
            'tanggal_sktb' => 'nullable|date',
            'lama_tk' => 'nullable|string|max:255',
        ]);

        // Include the user ID and form ID in the validated data
        $validatedData['user_id'] = Auth::id();
        $validatedData['form_id'] = $formId;

        // Use updateOrCreate to handle both creating and updating the registration
        $registration = Registration::updateOrCreate(
            ['user_id' => Auth::id()],
            $validatedData
        );

        // Redirect to the next step with a success message if the record is created/updated
        return redirect()->route('step2.show', ['user_id' => Auth::id()])
            ->with('success', 'Data saved successfully. Proceed to the next step.');
    }



    // Step 2: Show the form for Step 2
    public function showStep2($userId)
    {
        // Retrieve the registration record
        $registration = Registration::where('user_id', $userId)->first();

        return view('steptwo', [
            'registration' => $registration,
            'user_id' => $userId,
        ]);
    }



    // Step 2: Handle POST for Step 2
    public function postStep2(Request $request, $user_id)
    {
        $validatedData = $request->validate([
            'nama_lengkap_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|digits:16',
            'nama_lengkap_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|digits:16',
            'status_ayah' => 'nullable|array',
            'status_ayah.*' => 'in:Kandung,Tiri,Angkat',
            'status_ibu' => 'nullable|array',
            'status_ibu.*' => 'in:Kandung,Tiri,Angkat',
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
            'pendidikan_ayah_lain' => 'nullable|string|max:255',
            'pendidikan_ibu' => 'required|string|max:255',
            'pendidikan_ibu_lain' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ayah_detail' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'pekerjaan_ibu_detail' => 'nullable|string|max:255',
            'penghasilan_ayah' => 'required|string|max:255',
            'penghasilan_ibu' => 'required|string|max:255',
            'jumlah_tanggungan' => 'required|string|max:255',
            'nama_lengkap_tanggungan' => 'nullable|array',
            'sekolah_tanggungan' => 'nullable|array',
            'kelas_tanggungan' => 'nullable|array',
            'uang_sekolah_tanggungan' => 'nullable|array',
            'keterangan_tanggungan' => 'nullable|array',
        ]);

        // Find the registration record using the user ID
        $registration = Registration::where('user_id', $user_id)->firstOrFail();

        // Update registrati// Find the existing registration record and update with Step Two data
        $registration = Registration::where('user_id', $user_id)->first();
        $registration->update($validatedData);

        // Redirect to Step Three (final step)
        return redirect()->route('step3.show', ['user_id' => $user_id])
            ->with('success', 'Data successfully saved.');
    }



    // Step 3: Show the form for Step 3
    public function showStep3($userId)
    {
        // Fetch the registration record based on user_id
        $registration = Registration::where('user_id', $userId)->firstOrFail();

        return view('stepthree', [
            'registration' => $registration,
            'register_id' => $userId,
        ]);
    }

    // Step 3: Handle POST for Step 3
    public function postStep3(Request $request, $user_id)
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
            'tanggungan_wali' => 'nullable|string|max:255',
            'tanggungan_wali_lain' => 'nullable|string|max:255', // Only required if 'Lain-lain' is selected
        ]);

        $registration = Registration::where('user_id', $user_id)->first();
        $registration->update($validatedData);

        return redirect()->route('proofPayment.show', ['user_id' => $user_id])
            ->with('success', 'Data Wali successfully saved.');
    }


    // Show form for uploading proof of payment
    public function showProofPayment($user_id)
    {
        // Fetch the registration record for the given user ID
        $registration = Registration::where('user_id', $user_id)->firstOrFail();

        return view('proof_payment', compact('registration', 'user_id'));
    }


    // Handle proof of payment upload
    public function postProofPayment(Request $request, $user_id)
    {
        $validatedData = $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $registration = Registration::where('user_id', $user_id)->firstOrFail();

        if ($request->hasFile('bukti_pembayaran')) {
            // Delete the old file if it exists
            if ($registration->bukti_pembayaran && Storage::exists('public/' . $registration->bukti_pembayaran)) {
                Storage::delete('public/' . $registration->bukti_pembayaran);
            }

            // Store the new file
            $filePath = $request->file('bukti_pembayaran')->store('proof_payments', 'public');

            // Update the registration record with the new file path
            $registration->update(['bukti_pembayaran' => $filePath]);
        }

        return redirect()->route('profile.edit')->with('success', 'Bukti pembayaran berhasil diunggah.');
    }




    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Incomplete,Complete',
        ]);

        $registration = Registration::findOrFail($id);
        $registration->status = $request->status;
        $registration->save();

        return redirect()->route('dashboard')->with('success', 'Status updated successfully.');
    }

    // Success page after completing registration
    public function success()
    {
        return view('profile.edit');
    }
}
