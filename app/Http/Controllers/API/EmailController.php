<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Mail\Mailer as Mail;
use App\Mail\CustomMail;
use App\Http\Requests\Mail\SendCustomMailRequest;

class EmailController extends Controller
{
    /**
     * @var Mail
     */
    private $mail;

    /**
     * EmailController constructor
     * 
     * @param Mail $mail
     */
    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    /**
     * @param SendCustomMailRequest $request
     * 
     * @return void
     */
    public function index(SendCustomMailRequest $request)
    {
        $mail = new \stdClass;
        $mail->subject = request()->subject;
        $mail->senderEmail = request()->senderEmail;
        $mail->recipient = request()->recipient;
        $mail->senderName = request()->senderName;
        $mail->content = request()->content;

        return $this->sendEmail($mail);
    }

    /**
     * @param stdClass $mail
     * 
     * @return \Illuminate\Http\Response
     */
    public function sendEmail($mail)
    {
        $this->mail->to($mail->recipient)->send(new CustomMail($mail));
        return response()->json([
            'message' => 'Email sent',
            'status_code' => 200
        ], 200);
    }
}
