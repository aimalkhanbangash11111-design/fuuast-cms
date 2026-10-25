<!DOCTYPE html>
<html>
<body style="font-family:Arial; padding:20px;">
<h2 style="color:#1e40af;">FUUAST Complaint Management System</h2>
<p>Hello {{ $complaint->user->name ?? 'Student' }},</p>
<p>Your complaint <b style="color:blue;">{{ $complaint->complaint_code }}</b> has been updated:</p>
<p><b>Category:</b> {{ $complaint->category }}</p>
<p><b>Status:</b> <span style="background:#dbeafe; padding:4px 8px; border-radius:6px; font-weight:bold;">{{ $complaint->status }}</span></p>
<p><b>Remarks:</b> {{ $complaint->remarks ?? 'No remarks' }}</p>
<p><b>Anonymous:</b> {{ $complaint->is_anonymous ? '🔒 Yes' : 'No' }}</p>
<hr>
<p>Thank you for using FUUAST CMS!</p>
<p><small>Complaint: {{ $complaint->complaint_code }}</small></p>
</body>
</html>