<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Mail\VerifySubscription;
use App\Mail\WelcomeSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns'
        ]);

        $subscriber = Subscriber::where('email', $request->email)->first();

        if ($subscriber) {
            if ($subscriber->is_active) {
                return back()->with('newsletter_success', 'You are already subscribed!');
            }
            // If exists but not active, resend verification (update token just in case)
            $token = Str::random(32);
            $subscriber->update(['verification_token' => $token]);
        } else {
            // Create new
            $token = Str::random(32);
            Subscriber::create([
                'email' => $request->email,
                'is_active' => false,
                'verification_token' => $token
            ]);
        }

        try {
            Mail::to($request->email)->send(new VerifySubscription($token));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Subscription Email Error: ' . $e->getMessage());
            return back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }

        return back()->with('newsletter_success', 'Please check your email to confirm your subscription.');
    }

    public function verify($token)
    {
        $subscriber = Subscriber::where('verification_token', $token)->first();

        if (!$subscriber) {
            return redirect('/')->with('error', 'Invalid verification link.');
        }

        $subscriber->update([
            'is_active' => true,
            'verification_token' => null
        ]);

        Mail::to($subscriber->email)->send(new WelcomeSubscriber());

        return redirect('/')->with('newsletter_success', 'Subscription confirmed! Thank you.');
    }
}
