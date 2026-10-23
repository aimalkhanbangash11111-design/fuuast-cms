<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    // Show complaint form - 9 categories
    public function create()
    {
        $categories = [
            'Academic' => 'Academic Issue',
            'Hostel' => 'Hostel',
            'Canteen' => 'Canteen',
            'Transport' => 'Transport',
            'Library' => 'Library',
            'Administration' => 'Administration',
            'Harassment' => 'Harassment / Ragging',
            'IT' => 'IT / Lab',
            'Other' => 'Other'
        ];
        return view('complaints.create', compact('categories'));
    }

    // Store complaint - FCMS Module 2
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'sub_category' => 'nullable|string|max:100',
            'description' => 'required|string|min:20|max:1000',
            'file' => 'nullable|mimes:jpg,jpeg,png,pdf|max:5120', // 5MB
            'is_anonymous' => 'nullable|boolean'
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('complaints', 'public');
        }

        $complaint = Complaint::create([
            'user_id' => Auth::id(),
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'description' => $request->description,
            'file_path' => $filePath,
            'is_anonymous' => $request->has('is_anonymous') ? true : false,
            'status' => 'pending'
        ]);

        // complaint_code auto-generated from Model boot() = FCMS-2026-0001

        return redirect()->route('complaints.my')->with('success', 'Complaint Submitted! Your ID is: ' . $complaint->complaint_code);
    }

    // My Complaints - like My Attendance
    public function myComplaints()
    {
        $complaints = Complaint::where('user_id', Auth::id())->latest()->get();
        return view('complaints.my', compact('complaints'));
    }

    // Search by FCMS ID
    public function search(Request $request)
    {
        $code = $request->input('code');
        $complaint = Complaint::where('complaint_code', $code)->first();
        return view('complaints.search', compact('complaint'));
    }
}