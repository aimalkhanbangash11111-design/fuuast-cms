<x-app-layout>
<h2 class="font-bold text-xl m-4">Take Attendance - {{ $course->name }} ({{ $course->code }})</h2>
@if(session('success')) <div class="bg-green-100 p-2 m-4">{{ session('success') }}</div> @endif
<form method="POST" action="{{ route('teacher.attendance.store', $course) }}" class="m-4">
@csrf
<input type="date" name="date" value="{{ date('Y-m-d') }}" class="border p-2 mb-4">
<table class="w-full bg-white shadow">
<tr><th>Student</th><th>Present</th><th>Absent</th></tr>
@foreach($students as $student)
<tr class="border-t">
<td class="p-2">{{ $student->name }} ({{ $student->email }})</td>
<td class="p-2"><input type="radio" name="attendance[{{ $student->id }}]" value="Present" checked> Present</td>
<td class="p-2"><input type="radio" name="attendance[{{ $student->id }}]" value="Absent"> Absent</td>
</tr>
@endforeach
</table>
<button class="bg-blue-600 text-white px-4 py-2 mt-4 rounded">Save Attendance</button>
</form>
</x-app-layout>