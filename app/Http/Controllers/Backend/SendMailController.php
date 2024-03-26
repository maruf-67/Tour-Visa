<?php

namespace App\Http\Controllers\Backend;

use App\Mail\SendMail;
use App\Jobs\SendEmail;
use App\Models\Application;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function submit_application($id)
    {

        // $reference_id = $request->reference_id;
        $applications = Application::where('reference_id', $id)->get();

        foreach ($applications as $application) {
            $data = [
                'email' => $application->email,
                'subject' => 'Application Submission',
                // 'title' => 'Application Submission',
                'message' => 'Your application has been submitted successfully!',
            ];
            SendEmail::dispatch($data);
            // Mail::to($data['email'])->queue(new SendMail($data));


        }

        return back()->with('success', 'Email has been sent successfully!');
    }

    public function approved_application($id)
    {
        $application = Application::findOrFail($id);

        $data = [
            'email' => $application->email,
            'subject' => 'Application Approved',
            // 'title' => 'Application Submission',
            'message' => 'Your application has been Approved successfully!',
        ];
        SendEmail::dispatch($data);
        // Mail::to($data['email'])->queue(new SendMail($data));

        return back()->with('success', 'Email has been sent successfully!');
    }

    // public function sendMail()
    // {
    //     $mailData = [
    //         'title' => 'Mail from ItSolutionStuff.com',
    //         'url' => 'https://www.itsolutionstuff.com',
    //     ];

    //     Mail::to('hassan_alam198@yahoo.com')->send(new SendMail($mailData));
    //      return "Email has been sent successfully!";
    // }
}
