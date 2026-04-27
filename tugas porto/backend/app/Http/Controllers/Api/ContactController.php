<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Message;

class ContactController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Contact::first()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $message = Message::create($data);

        return response()->json([
            'success' => true,
            'data' => $message
        ]);
    }
}