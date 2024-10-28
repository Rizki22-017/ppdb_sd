<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Registration;
use Dompdf\Dompdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PhpOffice\PhpWord\TemplateProcessor;

class ProfileController extends Controller
{


    public function downloadPdf(Request $request)
    {
        $user = $request->user();

        // Load a Word template with placeholders
        $templatePath = resource_path('templates/profile_template.docx');
        $templateProcessor = new TemplateProcessor($templatePath);

        // Fill placeholders with user data
        $templateProcessor->setValue('NAME', $user->name);
        $templateProcessor->setValue('EMAIL', $user->email);
        $templateProcessor->setValue('CREATED_AT', $user->created_at->format('Y-m-d'));
        // Add more fields as needed

        // Save the filled template as HTML
        $htmlFilePath = storage_path('app/temp_profile.html');
        $templateProcessor->saveAs($htmlFilePath);
        $htmlContent = file_get_contents($htmlFilePath);

        // Convert HTML to PDF using Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($htmlContent);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('profile_' . $user->id . '.pdf');
    }
    /**
     * Display the user's profile form.
     */
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
