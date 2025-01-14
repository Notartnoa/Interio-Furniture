<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Show the payment page.
     *
     * @return \Illuminate\View\View
     */
    public function showPaymentPage()
    {
        return view('payment');
    }

    /**
     * Handle the payment proof upload.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadProof(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'payment_proof' => 'required|mimes:pdf|max:2048',
        ]);

        // Store the uploaded file
        $file = $request->file('payment_proof');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('payment_proofs', $filename, 'public');

        // Save file path or any related info to database if necessary
        // For example:
        // PaymentProof::create(['file_path' => $path, 'user_id' => auth()->id()]);

        return redirect()->route('welcome')->with('success', 'Payment proof uploaded successfully.');
    }
}
