<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <!-- Include Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white px-20 py-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-4">Student Registration</h2>
        <form action="{{ route('update_sec',$record->id) }}" method="POST">
            @csrf
            
            @method('PATCH')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" value="{{ $record->name }}" id="name" name="name" class="mt-1 p-2 border rounded-md w-full" required>
            </div>
            <div class="mb-4">
                <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                <input type="text" value="{{ $record->mobile }}" id="mobile" name="mobile" class="mt-1 p-2 border rounded-md w-full" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" value="{{ $record->email }}" id="email" name="email" class="mt-1 p-2 border rounded-md w-full" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Gender</label>
                <div class="mt-1 space-x-2">
                    <label class="inline-flex items-center">
                        <input type="radio" name="gender" value="Male" class="form-radio text-indigo-600">
                        <span class="ml-2">Male</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="gender" value="Female" class="form-radio text-indigo-600">
                        <span class="ml-2">Female</span>
                    </label>
                </div>
            </div>
            <div class="mb-4">
                <label for="dob" class="block text-sm font-medium text-gray-700">DOB</label>
                <input type="date" id="dob" value="{{ $record->dob }}" name="dob" class="mt-1 p-2 border rounded-md w-full" required>
            </div>
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <textarea id="address"  name="address" rows="4" class="mt-1 p-2 border rounded-md w-full" required>{{ $record->address }}</textarea>
            </div>
            
            
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Submit</button>
        </form>
    </div>
    <script>
        
        
    </script>
</body>
</html>
