<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - FUUAST</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="bg-blue-800 text-white p-5">
        <h1 class="text-2xl font-bold">FUUAST - Admin Panel</h1>
        <p>Welcome: {{ Auth::user()->name }} | Role: {{ Auth::user()->role }} | Email: {{ Auth::user()->email }}</p>
    </div>

    <div class="p-8">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-4">Week 6 - Day 1 Complete!</h2>
            <p>Ab ye white wala text nahi, asli dashboard hai!</p>
            <a href="/logout" class="bg-red-500 text-white px-4 py-2 rounded mt-4 inline-block">Logout</a>
        </div>
    </div>
</body>
</html>