<x-app-layout>
<h2 class="font-bold text-xl m-4">My Attendance</h2>
<table class="w-full bg-white shadow m-4">
<tr><th>Date</th><th>Course</th><th>Status</th></tr>
@foreach($attendances as $att)
<tr class="border-t">
<td class="p-2">{{ $att->date }}</td>
<td class="p-2">{{ $att->course->name ?? 'N/A' }}</td>
<td class="p-2">{{ $att->status }}</td>
</tr>
@endforeach
</table>
</x-app-layout>