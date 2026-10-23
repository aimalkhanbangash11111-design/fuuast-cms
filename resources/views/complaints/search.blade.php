<x-app-layout>
    <x-slot name="header"><h2>Search Result - {{ $code }}</h2></x-slot>
    <div class="py-6 max-w-7xl mx-auto">
        <div class="bg-white p-6 rounded shadow">
            @if($complaint)
                <p>Found: <b>{{ $complaint->complaint_code }}</b> - {{ $complaint->category }} - {{ $complaint->status }}</p>
            @else
                <p style="color:red">No complaint found with {{ $code }}</p>
            @endif
            <a href="/my-complaints" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Back</a>
        </div>
    </div>
</x-app-layout>