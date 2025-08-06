<x-app-layout>

    <div class="max-w-4xl mx-auto p-4 space-y-8">

        {{-- button --}}
        <a href="/displayForm" class="inline-block bg-blue-600 text-white ml-2 px-4 py-2 rounded hover:bg-blue-700">
            Create Post
        </a>

        <div class="max-w-4xl mx-auto p-2 space-y-4">
            <h2 class="text-2xl font-bold  text-gray-800 dark:text-white">All Posts</h2>

            @foreach($posts as $post)
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm p-6">
                    <div class="mb-6">
                        <div class="flex justify-between ">
                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">{{ $post->title }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                Published on: {{ format_date($post->created_at) }}
                            </p>
                        </div>

                        <p class="text-gray-600 dark:text-gray-300 mt-2">{{ $post->body }}</p>
                    </div>

                    <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
                        <p>Published by: <span class="font-medium">{{ $post->user->name }}</span></p>
                        {{-- <p>Published by: <span class="font-medium">{{ $post->user->created_at }}</span></p> --}}


                        <div class="flex items-center space-x-2">
                            {{-- Edit Button --}}
                            <a href="/edit-post/{{ $post->id }}"
                                class="inline-block bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700 transition text-sm">
                                Edit
                            </a>

                            {{-- Delete Button --}}
                            <form action="/delete-post/{{ $post->id }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700 transition text-sm">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

</x-app-layout>