<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Add New Course - FUUAST</h1>
        
        <form method="POST" action="{{ route('admin.courses.store') }}" class="bg-white p-6 rounded-lg shadow">
            @csrf
            <div class="mb-4">
                <label class="block">Course Name</label>
                <input type="text" name="name" class="w-full border p-2 rounded" placeholder="e.g. Database Systems" required>
            </div>
            <div class="mb-4">
                <label class="block">Course Code</label>
                <input type="text" name="code" class="w-full border p-2 rounded" placeholder="e.g. CS-301" required>
            </div>
            <div class="mb-4">
                <label class="block">Department</label>
                <input type="text" name="department" class="w-full border p-2 rounded" placeholder="e.g. BSCS" required>
            </div>
            <div class="mb-4">
                <label class="block">Assign Teacher</label>
                <select name="teacher_id" class="w-full border p-2 rounded">
                    <option value="">-- Select Teacher --</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Create Course</button>
        </form>
    </div>
</x-app-layout>