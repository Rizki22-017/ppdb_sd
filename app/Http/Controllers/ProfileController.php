<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function downloadPdf()
    {
        // Ensure the temp_documents directory exists
        $tempDir = public_path("assets/temp_documents");
        if (!file_exists($tempDir)) {
            mkdir($tempDir, 0755, true);
        }

        // Fetch registration data
        $user = auth()->user();
        $registration = Registration::where('user_id', $user->id)->first();

        if (!$registration) {
            return redirect()->route('profile.edit')->with('error', 'No registration data found.');
        }

        // Load the HTML template
        $templatePath = public_path('assets/profile_template_rev.html');
        if (!file_exists($templatePath)) {
            return redirect()->route('profile.edit')->with('error', 'Template file not found.');
        }

        $htmlContent = file_get_contents($templatePath);

        // Set placeholders with registration data
        $placeholders = [
            '{form_id}' => $registration->form_id,
            '{nama_lengkap}' => $registration->nama_lengkap,
            '{jenis_kelamin}' => $registration->jenis_kelamin,
            '{tempat_lahir}' => $registration->tempat_lahir,
            '{tanggal_lahir}' => $registration->tanggal_lahir,
            '{tinggi}' => $registration->tinggi,
            '{berat}' => $registration->berat,
            '{anak_ke}' => $registration->anak_ke,
            '{jumlah_saudara_kandung}' => $registration->jumlah_saudara_kandung,
            '{jumlah_saudara_tiri}' => $registration->jumlah_saudara_tiri,
            '{jumlah_saudara_angkat}' => $registration->jumlah_saudara_angkat,
            '{bahasa}' => $registration->bahasa,
            '{alamat_anak}' => $registration->alamat_anak,
            '{nik}' => $registration->nik,
            '{nomor_kk}' => $registration->nomor_kk,
            '{no_regis_akta}' => $registration->no_regis_akta,
            '{jarak}' => $registration->jarak,
            '{tempat_tinggal}' => $registration->tempat_tinggal,
            '{transportasi}' => implode(', ', $registration->transportasi),
            '{nama_sekolah_dulu}' => $registration->nama_sekolah_dulu,
            '{nspn_sekolah}' => $registration->nspn_sekolah,
            '{alamat_sekolah_dulu}' => $registration->alamat_sekolah_dulu,
            '{desa_sekolah}' => $registration->desa_sekolah,
            '{kabupaten_sekolah}' => $registration->kabupaten_sekolah,
            '{nisn}' => $registration->nisn,
            '{tanggal_sktb}' => $registration->tanggal_sktb,
            '{lama_tk}' => $registration->lama_tk,
            '{nama_lengkap_ayah}' => $registration->nama_lengkap_ayah,
            '{nik_ayah}' => $registration->nik_ayah,
            '{nama_lengkap_ibu}' => $registration->nama_lengkap_ibu,
            '{nik_ibu}' => $registration->nik_ibu,
            '{status_ayah}' => $registration->status_ayah,
            '{status_ibu}' => $registration->status_ibu,
            '{tempat_lahir_ayah}' => $registration->tempat_lahir_ayah,
            '{tanggal_lahir_ayah}' => $registration->tanggal_lahir_ayah,
            '{tempat_lahir_ibu}' => $registration->tempat_lahir_ibu,
            '{tanggal_lahir_ibu}' => $registration->tanggal_lahir_ibu,
            '{alamat_ortu}' => $registration->alamat_ortu,
            '{kode_pos_ortu}' => $registration->kode_pos_ortu,
            '{no_telp_ortu}' => $registration->no_telp_ortu,
            '{kantor_ayah}' => $registration->kantor_ayah,
            '{kantor_ibu}' => $registration->kantor_ibu,
            '{no_hp_ayah}' => $registration->no_hp_ayah,
            '{no_hp_ibu}' => $registration->no_hp_ibu,
            '{kawasan_tinggal}' => $registration->kawasan_tinggal,
            '{status_tempat_tinggal}' => $registration->status_tempat_tinggal,
            '{pendidikan_ayah}' => $registration->pendidikan_ayah,
            '{pendidikan_ayah_lain}' => $registration->pendidikan_ayah_lain,
            '{pendidikan_ibu}' => $registration->pendidikan_ibu,
            '{pendidikan_ibu_lain}' => $registration->pendidikan_ibu_lain,
            '{pekerjaan_ayah}' => $registration->pekerjaan_ayah,
            '{pekerjaan_ayah_detail}' => $registration->pekerjaan_ayah_detail,
            '{pekerjaan_ibu}' => $registration->pekerjaan_ibu,
            '{pekerjaan_ibu_detail}' => $registration->pekerjaan_ibu_detail,
            '{penghasilan_ayah}' => $registration->penghasilan_ayah,
            '{penghasilan_ibu}' => $registration->penghasilan_ibu,
            '{jumlah_tanggungan}' => $registration->jumlah_tanggungan,
            '{nama_lengkap_tanggungan}' => implode(' | ', $registration->nama_lengkap_tanggungan ?? []),
            '{sekolah_tanggungan}' => implode(' | ', $registration->sekolah_tanggungan ?? []),
            '{kelas_tanggungan}' => implode(' | ', $registration->kelas_tanggungan ?? []),
            '{uang_sekolah_tanggungan}' => implode(' | Rp.', $registration->uang_sekolah_tanggungan ?? []),
            '{keterangan_tanggungan}' => implode(' | ', $registration->keterangan_tanggungan ?? []),
            '{nama_wali}' => $registration->nama_wali,
            '{tempat_lahir_wali}' => $registration->tempat_lahir_wali,
            '{tanggal_lahir_wali}' => $registration->tanggal_lahir_wali,
            '{pendidikan_wali}' => $registration->pendidikan_wali,
            '{hubungan_murid_wali}' => $registration->hubungan_murid_wali,
            '{tanggungan_wali}' => $registration->tanggungan_wali,
            '{alamat_wali}' => $registration->alamat_wali,
            '{kodepos_wali}' => $registration->kodepos_wali,
            '{telepon_wali}' => $registration->telepon_wali,
            '{alamat_kantor_wali}' => $registration->alamat_kantor_wali,
            '{status}' => $registration->status,
        ];

        $htmlContent = str_replace(array_keys($placeholders), array_values($placeholders), $htmlContent);

        echo $htmlContent;
        echo "<script>window.print();</script>";
    }

    /**
     * Display the user's profile form.
     */


    public function result(Request $request): View
    {
        $user = $request->user();

        // Fetch the registration status if a registration exists for the user
        $registration = Registration::where('user_id', $user->id)->first();

        return view('result', [
            'registrationStatus' => $registration ? $registration->status : 'Tidak Terdaftar',
            'formId' => $registration ? $registration->form_id : 'Tidak Di Temukan',
        ]);
    }



    public function edit(Request $request): View
    {
        $user = $request->user();

        // Fetch the registration status if a registration exists for the user
        $registration = Registration::where('user_id', $user->id)->first();

        return view('profile.edit', [
            'user' => $user,
            'registrationStatus' => $registration ? $registration->status : 'Tidak Terdaftar', // Default if no registration
            'formId' => $registration ? $registration->form_id : 'Tidak Di Temukan',
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}