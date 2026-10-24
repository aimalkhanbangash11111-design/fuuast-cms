<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Admin - All Complaints (Week 7)</h2></x-slot>
<div class="py-6"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
@if(session('success'))<div class="bg-green-100 p-4 rounded mb-4">{{ session('success') }}</div>@endif
<div class="bg-white p-6 rounded shadow overflow-x-auto">
<table class="w-full border">
<thead><tr class="bg-gray-100"><th class="border p-2">FCMS Code</th><th class="border p-2">Student</th><th class="border p-2">Category</th><th class="border p-2">Anonymous</th><th class="border p-2">Status</th><th class="border p-2">Action</th></tr></thead>
<tbody>
@foreach($complaints as $c)
<tr>
<td class="border p-2 font-bold">{{ $c->complaint_code }}</td>
<td class="border p-2">{{ $c->is_anonymous ? 'Anonymous' : ($c->user->name ?? 'N/A') }}</td>
<td class="border p-2">{{ $c->category }}</td>
<td class="border p-2">{{ $c->is_anonymous ? '🔒 Yes' : 'No' }}</td>
<td class="border p-2"><span class="px-2 py-1 rounded text-xs {{ $c->status == 'pending' ? 'bg-yellow-200' : ($c->status == 'resolved' ? 'bg-green-200' : 'bg-blue-200') }}">{{ $c->status }}</span></td>
<td class="border p-2">
<form method="POST" action="{{ route('admin.complaints.status', $c) }}">@csrf
<select name="status" class="border rounded p-1 text-sm">
<option value="pending" {{ $c->status=='pending'?'selected':'' }}>Pending</option>
<option value="in-progress" {{ $c->status=='in-progress'?'selected':'' }}>In-Progress</option>
<option value="resolved" {{ $c->status=='resolved'?'selected':'' }}>Resolved</option>
<option value="rejected" {{ $c->status=='rejected'?'selected':'' }}>Rejected</option>
</select>
<input type="text" name="remarks" placeholder="Remarks" value="{{ $c->remarks }}" class="border rounded p-1 text-sm w-32">
<button class="bg-blue-600 text-white px-3 py-1 rounded text-sm">Update</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div></div>
</x-app-layout>