<?php

namespace App\Listeners;

use App\Events\BookingSuccess;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSmsToCustomer
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BookingSuccess $event): void
    {
        $user = $event->user;
        $booking = $event->booking;
        $phoneNumber = '+' . $user->phone;

        $sid = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $client = new \Twilio\Rest\Client($sid, $token);

        // Use the Client to make requests to the Twilio REST API
        $client->messages->create(
            // The number you'd like to send the message to
            $phoneNumber,
            [
                // A Twilio phone number you purchased at https://console.twilio.com
                'from' => env('TWILIO_PHONE_NUMBER'),
                // The body of the text message you'd like to send
                'body' => sprintf('Booking successfully !. The appointment will take place on the %s at %s', $booking->date, $booking->status_code)
            ]
        );
    }
}
