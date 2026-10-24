<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Admin - All Complaints (Week 7)</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div style="background:#d1fae5;padding:12px;border-radius:8px;margin-bottom:12px;color:#065f46;font-weight:bold;">
                    {{ session('success') }}
                </div>
            @endif

            <div style="background:white;padding:20px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);">
                <table style="width:100%;border-collapse:collapse;">
                    <thead>
                        <tr style="background:#f3f4f6;">
                            <th style="border:1px solid #ddd;padding:10px;">FCMS Code</th>
                            <th style="border:1px solid #ddd;padding:10px;">Student</th>
                            <th style="border:1px solid #ddd;padding:10px;">Category</th>
                            <th style="border:1px solid #ddd;padding:10px;">Anonymous</th>
                            <th style="border:1px solid #ddd;padding:10px;">Status</th>
                            <th style="border:1px solid #ddd;padding:10px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($complaints as $c)
                        <tr>
                            <td style="border:1px solid #ddd;padding:10px;font-weight:bold;color:blue;">{{ $c->complaint_code }}</td>
                            <td style="border:1px solid #ddd;padding:10px;">{{ $c->is_anonymous ? 'Anonymous 🔒' : ($c->user->name ?? 'N/A') }}</td>
                            <td style="border:1px solid #ddd;padding:10px;">{{ $c->category }}</td>
                            <td style="border:1px solid #ddd;padding:10px;">{{ $c->is_anonymous ? '🔒 Yes' : 'No' }}</td>
                            <td style="border:1px solid #ddd;padding:10px;"><b>{{ $c->status }}</b></td>
                            <td style="border:1px solid #ddd;padding:10px;">
                                <form method="POST" action="{{ route('admin.complaints.status', $c->id) }}">
                                    @csrf
                                    <select name="status" style="border:1px solid #ccc;padding:6px;border-radius:4px;">
                                        <option value="pending" {{ $c->status=='pending'?'selected':'' }}>Pending</option>
                                        <option value="in-progress" {{ $c->status=='in-progress'?'selected':'' }}>In-Progress</option>
                                        <option value="resolved" {{ $c->status=='resolved'?'selected':'' }}>Resolved</option>
                                        <option value="rejected" {{ $c->status=='rejected'?'selected':'' }}>Rejected</option>
                                    </select>
                                    <input type="text" name="remarks" placeholder="Remarks" value="{{ $c->remarks }}" style="border:1px solid #ccc;padding:6px;border-radius:4px;width:120px;margin-top:4px;">
                                    <br>
                                    <button type="submit" style="background:#2563eb;color:white;padding:8px 16px;border-radius:6px;font-weight:bold;margin-top:6px;width:100%;border:none;cursor:pointer;">Update</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>