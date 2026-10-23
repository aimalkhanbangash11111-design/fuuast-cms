<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">All Courses - FUUAST CMS</h1>
            <a href="{{ route('admin.courses.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Add New Course
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">ID</th>
                        <th class="p-3 text-left">Course Name</th>
                        <th class="p-3 text-left">Code</th>
                        <th class="p-3 text-left">Department</th>
                        <th class="p-3 text-left">Teacher</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">{{ $course->id }}</td>
                            <td class="p-3 font-semibold">{{ $course->name }}</td>
                            <td class="p-3">{{ $course->code }}</td>
                            <td class="p-3">{{ $course->department }}</td>
                            <td class="p-3">{{ $course->teacher->name ?? 'Not Assigned' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">
                                No Courses Yet. Click "Add New Course" to create first one!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>