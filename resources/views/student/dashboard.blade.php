<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUUAST - Student Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <div class="bg-orange-600 text-white p-6 shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold">FUUAST - Student Panel</h1>
                <p class="mt-2 text-orange-200">Welcome: {{ Auth::user()->name }} | Role: {{ Auth::user()->role }}</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="p-8">
        
        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow border-l-4 border-orange-500">
                <h3 class="text-gray-500 text-sm">Enrolled Courses</h3>
                <p class="text-3xl font-bold text-gray-800 mt-2">5 Courses</p>
                <p class="text-xs text-orange-600 mt-1">Current Semester</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500">
                <h3 class="text-gray-500 text-sm">Pending Assignments</h3>
                <p class="text-3xl font-bold text-gray-800 mt-2">3 Pending</p>
                <p class="text-xs text-blue-600 mt-1">Due This Week</p>
            </div>
        </div>

        <!-- Module Box -->
        <div class="bg-white p-8 rounded-lg shadow">
            <h2 class="text-2xl font-bold text-gray-800 border-b pb-2">Student Module - Ready</h2>
            <p class="text-gray-600 mt-4">Access your courses, view lectures, and submit assignments here.</p>
            
            <div class="mt-6 p-4 bg-orange-50 rounded border border-orange-200">
                <p class="text-sm text-orange-800"><strong>System Status:</strong> Student portal active. Ready for classes.</p>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="mt-6">
                @csrf
                <button class="bg-red-600 hover:bg-red-700 text-white px-8 py-2 rounded-lg font-semibold transition">
                    Logout
                </button>
            </form>
        </div>

    </div>

</body>
</html>