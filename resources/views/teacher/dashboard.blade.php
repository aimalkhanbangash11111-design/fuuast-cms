<x-app-layout>
<div class="p-6">
<h2 class="font-bold text-2xl mb-4">Teacher Dashboard - My Courses</h2>

<div class="grid grid-cols-1 gap-4">
@foreach($courses as $course)
<div class="bg-white p-4 shadow rounded flex justify-between items-center">
<div>
<h3 class="font-bold">{{ $course->name }} ({{ $course->code }})</h3>
<p class="text-sm text-gray-600">{{ $course->department }}</p>
</div>
<a href="{{ route('teacher.attendance.create', $course) }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Take Attendance</a>
</div>
@endforeach
</div>

@if($courses->isEmpty())
<p class="mt-4 text-gray-500">No courses assigned yet. Admin will assign from Admin Panel.</p>
@endif
</div>
</x-app-layout>