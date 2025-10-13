<x-layout>
@section('title', 'Timeline')
<!-- ...existing code... -->
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold mb-4">Timeline</h2>

    <div class="space-y-4">
        @foreach($sns as $post)
            <article class="flex gap-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition">
                <div class="flex-shrink-0">
                    <div class="h-12 w-12 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-lg font-bold text-gray-700 dark:text-gray-200">
                        {{ strtoupper(substr($post->username, 0, 1) ?: 'N') }}
                    </div>
                </div>

                <!-- content -->
                <div class="flex-1">
                    <header class="flex items-center gap-2 text-sm">
                        <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $post->username }}</span>
                        <span class="text-gray-400">·</span>
                        <time class="text-gray-400">{{ $post->created_at->diffForHumans() }}</time>
                    </header>

                    <div class="mt-2 text-gray-900 dark:text-gray-100">
                        <p class="whitespace-pre-wrap">{{ $post->post }}</p>
                    </div>
                    </footer>
                </div>
            </article>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $sns->links() }}
    </div>
</div>
</x-layout>