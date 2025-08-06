<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-6 bg-white rounded shadow mt-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Post</h1>
        
        <form action="/edit-post/{{ $post->id }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Post Title</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Body -->
            <div>
                <label for="body" class="block text-sm font-medium text-gray-700">Post Body</label>
                <textarea name="body" id="body" rows="6"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $post->body }}</textarea>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

</body>
</html>
