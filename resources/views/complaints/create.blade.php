<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Lodge New Complaint - FCMS</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white p-6 rounded shadow">
            
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Category - 9 categories -->
                <div class="mb-4">
                    <label class="block font-bold">Complaint Category *</label>
                    <select name="category" required class="w-full border rounded p-2">
                        <option value="">-- Select Category --</option>
                        <option value="Academic">Academic Issue</option>
                        <option value="Hostel">Hostel</option>
                        <option value="Canteen">Canteen</option>
                        <option value="Transport">Transport</option>
                        <option value="Library">Library</option>
                        <option value="Administration">Administration</option>
                        <option value="Harassment">Harassment / Ragging - Anonymous Allowed</option>
                        <option value="IT">IT / Lab</option>
                        <option value="Other">Other</option>
                    </select>
                    @error('category') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Sub Category -->
                <div class="mb-4">
                    <label class="block font-bold">Sub Category (Optional)</label>
                    <input type="text" name="sub_category" placeholder="e.g. Fees, Marks, etc" class="w-full border rounded p-2">
                </div>

                <!-- Description - 20 letters min -->
                <div class="mb-4">
                    <label class="block font-bold">Description * (Min 20 letters)</label>
                    <textarea name="description" rows="5" required minlength="20" maxlength="1000" 
                        placeholder="Describe your issue in detail (20-1000 letters)..." 
                        class="w-full border rounded p-2"></textarea>
                    @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- File Upload - 5MB -->
                <div class="mb-4">
                    <label class="block font-bold">Proof (JPG/PNG/PDF - Max 5MB) Optional</label>
                    <input type="file" name="file" accept=".jpg,.jpeg,.png,.pdf" class="w-full border rounded p-2">
                    @error('file') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Anonymous Toggle - 95% female demand -->
                <div class="mb-6 bg-yellow-50 p-4 rounded border border-yellow-200">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_anonymous" value="1" class="mr-2 h-5 w-5">
                        <span class="font-bold">Submit as Anonymous 🔒</span>
                    </label>
                    <p class="text-sm text-gray-600 mt-1">Your name/roll no will be hidden. Recommended for Harassment/Ragging complaints. (95% female students demanded this feature in survey)</p>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Submit Complaint - Get FCMS-2026-XXXX ID
                </button>

                <a href="{{ route('complaints.my') }}" class="ml-4 text-gray-600">My Complaints</a>
            </form>
        </div>
    </div>
</x-app-layout>