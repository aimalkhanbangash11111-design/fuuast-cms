<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Mail\ComplaintStatusMail;
use Illuminate\Support\Facades\Mail;
class ComplaintController extends Controller
{
    public function index(){
        $complaints = Complaint::with('user')->latest()->get();
        return view('admin.complaints.index', compact('complaints'));
    }

    public function updateStatus(Request $request, Complaint $complaint){
        $request->validate([
            'status' => 'required|in:pending,in-progress,resolved,rejected,escalated',
            'remarks' => 'nullable|string|max:500'
        ]);

        $complaint->update([
            'status' => $request->status,
            'remarks' => $request->remarks,
            'resolved_at' => $request->status == 'resolved' ? now() : null
        ]);

            // WEEK 8 - EMAIL NOTIFICATION
    try {
        if(!$complaint->is_anonymous && $complaint->user && $complaint->user->email){
            Mail::to($complaint->user->email)->send(new ComplaintStatusMail($complaint));
        }
    } catch (\Exception $e) {
        // Email fail bhi ho to status update ho jayega
    }

        return back()->with('success', $complaint->complaint_code.' -> '.$request->status);
    }
}