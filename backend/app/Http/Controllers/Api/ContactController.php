<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactReceived;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'message' => 'required|string|max:3000',
        ], [
            'name.required'    => 'Merci de renseigner votre nom.',
            'email.required'   => 'Merci de renseigner votre e-mail.',
            'email.email'      => "Cette adresse e-mail n'est pas valide.",
            'message.required' => 'Merci de saisir votre message.',
        ]);

        // 1) Toujours enregistré en base (visible dans l'admin)
        $msg = ContactMessage::create($data);

        // 2) E-mail vers l'adresse par défaut
        try {
            $to = config('portfolio.contact_to');
            if ($to) {
                Mail::to($to)->send(new ContactReceived($msg));
            }
        } catch (\Throwable $e) {
            Log::error('Envoi e-mail contact échoué : ' . $e->getMessage());
        }

        return response()->json(['ok' => true, 'message' => 'Message envoyé, merci !']);
    }
}
