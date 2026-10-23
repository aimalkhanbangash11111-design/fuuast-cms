<!DOCTYPE html>
<html>
<head>
    <title>FUUAST - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="bg-blue-800 text-white p-6 shadow-lg">
        <h1 class="text-3xl font-bold">FUUAST - Administration Panel</h1>
        <p class="mt-2 text-blue-200">Welcome: {{ Auth::user()->name }} | Role: {{ Auth::user()->role }} | Email: {{ Auth::user()->email }}</p>
    </div>

    <div class="p-8">
        <div class="grid grid-cols-3 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500">
                <h3 class="text-gray-500">Total Students</h3>
                <p class="text-3xl font-bold">150</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow border-l-4 border-green-500">
                <h3 class="text-gray-500">Total Teachers</h3>
                <p class="text-3xl font-bold">25</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow border-l-4 border-purple-500">
                <h3 class="text-gray-500">Departments</h3>
                <p class="text-3xl font-bold">8</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4 text-gray-800">System Status</h2>
            <p class="text-green-600 font-semibold">✓ Week 6 - Module 1 Completed Successfully</p>
            <p class="text-gray-600 mt-2">Admin dashboard is now operational and ready for user management.</p>
            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>