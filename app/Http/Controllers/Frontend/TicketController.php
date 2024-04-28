<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\FormTicketRequest;
use App\Mail\SendContactMail;
use App\Models\Ticket;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function ticket()
    {
        return view('frontend.index');
    }

    public function ticketSendRequest(FormTicketRequest $request)
    {
        $data = $request->validated();
        try {
            Ticket::create([
                'faculty'=>$data['faculty'],
                'type'=>$data['type'],
                'category'=>$data['category'],
                'department'=>$data['department'],
                'teacher'=>$data['teacher'],
                'student'=>$data['student'],
                'email'=>$data['email'],
                'priority'=>$data['priority'],
                'message'=>$data['message'],
            ]);

            $fromAddress =  config('mail.main_email');
            $toAddress =  config('mail.main_email_to');
            $fromName = 'Admin';
            $mail = new SendContactMail($data);
            $mail->from($fromAddress, $fromName);
            Mail::to($toAddress)->send($mail);

            return response()->json([
                'success' => true,
                'data' => '',
                'message' => 'Your request has been sent'
            ]);
        }catch (\Exception $e) {
            dd($e->getMessage());
            Log::channel('frontend')->error($e->getMessage());
            return response()->json([
                'success' => false,
                'data' => '',
                'message' => $e->getMessage()
            ]);
        }

    }

}
