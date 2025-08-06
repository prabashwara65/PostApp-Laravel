<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<x-app-layout>
    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
            <h2 class="text-lg font-bold mb-4 text-gray-900 dark:text-gray-100">Create New Post</h2>
            <form action="/create-post" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="title" placeholder="Title"
                    class="w-full p-2 border rounded-md dark:bg-gray-700 dark:text-white" required>
                <textarea name="body" placeholder="Body..."
                    class="w-full p-2 border rounded-md dark:bg-gray-700 dark:text-white" rows="4" required></textarea>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-md">
                    Create Post
                </button>
            </form>
        </div>
    </div>
</x-app-layout>

</body>
</html>