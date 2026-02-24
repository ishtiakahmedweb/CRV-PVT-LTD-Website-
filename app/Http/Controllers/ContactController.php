<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'ভ্যালিডেশন ব্যর্থ হয়েছে।',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            ContactMessage::create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'মেসেজটি সফলভাবে পাঠানো হয়েছে। ধন্যবাদ!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'দুঃখিত, মেসেজটি পাঠানো সম্ভব হয়নি। আবার চেষ্টা করুন।'
            ], 500);
        }
    }
}
