<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">My Complaints - FCMS</h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto">
        <div class="bg-white p-6 rounded shadow">
            
            <div class="flex justify-between mb-6">
                <h3 class="text-lg font-bold">Total: {{ $complaints->count() }} Complaints</h3>
                <a href="{{ route('complaints.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ New Complaint</a>
            </div>

            <!-- Search by ID -->
            <form action="{{ route('complaints.search') }}" method="GET" class="mb-6 flex gap-2">
                <input type="text" name="complaint_code" placeholder="Search by FCMS-2026-XXXX" class="border p-2 rounded w-64">
                <button type="submit" class="bg-gray-800 text-white px-4 rounded">Search</button>
            </form>

            <table class="w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border p-2">ID</th>
                        <th class="border p-2">Category</th>
                        <th class="border p-2">Status</th>
                        <th class="border p-2">Anonymous?</th>
                        <th class="border p-2">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($complaints as $c)
                    <tr>
                        <td class="border p-2 font-mono text-sm">{{ $c->complaint_code }}</td>
                        <td class="border p-2">{{ $c->category }}</td>
                        <td class="border p-2">
                            @if($c->status == 'Pending')
                                <span class="bg-yellow-200 px-2 py-1 rounded text-xs">{{ $c->status }}</span>
                            @elseif($c->status == 'Viewed')
                                <span class="bg-blue-200 px-2 py-1 rounded text-xs">{{ $c->status }}</span>
                            @elseif($c->status == 'Escalated')
                                <span class="bg-red-200 px-2 py-1 rounded text-xs font-bold">Escalated to HOD (72h+)</span>
                            @else
                                <span class="bg-green-200 px-2 py-1 rounded text-xs">{{ $c->status }}</span>
                            @endif
                        </td>
                        <td class="border p-2">@if($c->is_anonymous) 🔒 Yes @else No @endif</td>
                        <td class="border p-2 text-sm">{{ $c->created_at->format('d M Y') }}<br><span class="text-xs text-gray-500">Day 1 Submitted</span></td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="p-4 text-center text-gray-500">No complaints yet. Lodge your first complaint!</td></tr>
                    @endforelse
                </tbody>
            </table>
            
            <p class="mt-4 text-sm text-gray-500">* Timeline: Day 1 Submitted → Day 2 Viewed → Day 4 Escalated (Auto 72h) → Resolved</p>
        </div>
    </div>
</x-app-layout>