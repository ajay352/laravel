<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>
    
<!-- <div class="bg-white shadow-md rounded-lg p-6 w-96 mx-auto mt-20">
    <h2 class="text-2xl font-semibold mb-4">Card Form</h2>
    
    
    <form action="" method="POST">
    
    
    
    
    <div class="mb-4">
        <label for="Subject" class="block text-sm font-medium text-gray-600">Text Input</label>
        <input
            type="text"
            id="text-input"
            name=""
            class="mt-1 p-2 border rounded-md w-full"
            placeholder="Subject name "
            value=""
        >
    </div>

    
    <div class="mb-4">
        <label for="Mark" class="block text-sm font-medium text-gray-600">Number Input</label>
        <input
            type="number"
            id="number-input"
            name=""
            class="mt-1 p-2 border rounded-md w-full"
            placeholder="Enter a mark"
            value=""
        >
    </div>
    

    
    <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">
            
        </button>
    </div>
</form>
</div> -->
@foreach ($users as $user)
<p>{{$user->mark}}</p>
<p>{{$user->subject}}</p>
@endforeach


</body>
</html>