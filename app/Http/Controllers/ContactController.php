<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request): JsonResponse
    {
        $agent = new Agent;

        $referrer = $request->headers->get('referer');
        $sanitizedReferrer = null;
        if ($referrer && filter_var($referrer, FILTER_VALIDATE_URL)) {
            $sanitizedReferrer = Str::limit($referrer, 500, '');
        }

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company,
            'phone' => $request->phone,
            'message' => $request->message,
            'ip_address' => $request->ip(),
            'user_agent' => Str::limit($request->userAgent(), 500, ''),
            'browser' => $agent->browser(),
            'platform' => $agent->platform(),
            'device' => $agent->isMobile() ? ($agent->isTablet() ? 'Tablet' : 'Mobile') : 'Desktop',
            'referrer_url' => $sanitizedReferrer,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your message has been sent successfully! I\'ll get back to you soon.',
        ]);
    }
}
