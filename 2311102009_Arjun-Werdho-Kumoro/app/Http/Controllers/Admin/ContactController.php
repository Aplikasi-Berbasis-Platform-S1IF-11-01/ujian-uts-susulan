<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Public: Simpan pesan dari landing page
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        $contact = Contact::create($request->only(['name', 'email', 'subject', 'message']));

        return response()->json([
            'message' => 'Message sent successfully! I\'ll get back to you soon.',
            'data'    => $contact
        ], 201);
    }

    // Admin: Lihat semua pesan
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return response()->json(['data' => $contacts]);
    }

    // Admin: Hapus pesan
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(['message' => 'Message deleted.']);
    }
}