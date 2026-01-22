<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Jenssegers\Agent\Agent;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request): JsonResponse
    {
        $agent = new Agent;

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company,
            'phone' => $request->phone,
            'message' => $request->message,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'browser' => $agent->browser(),
            'platform' => $agent->platform(),
            'device' => $agent->isMobile() ? ($agent->isTablet() ? 'Tablet' : 'Mobile') : 'Desktop',
            'referrer_url' => $request->headers->get('referer'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your message has been sent successfully! I\'ll get back to you soon.',
        ]);
    }
}
