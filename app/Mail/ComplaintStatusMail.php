<?php
namespace App\Mail;
use App\Models\Complaint;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComplaintStatusMail extends Mailable
{
    use Queueable, SerializesModels;
    public $complaint;

    public function __construct(Complaint $complaint)
    {
        $this->complaint = $complaint;
    }

    public function build()
    {
        return $this->subject('FUUAST CMS - '.$this->complaint->complaint_code.' '.$this->complaint->status)
                    ->view('emails.complaint_status');
    }
}