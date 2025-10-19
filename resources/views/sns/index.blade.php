<x-layout>
@section('title', 'Timeline')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold mb-4">Timeline</h2>

    <div class="space-y-4">
        @foreach($sns as $post)
            <article id="post-{{ $post->id }}" class="flex gap-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition">
                <div class="flex-shrink-0">
                    <div class="h-12 w-12 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-lg font-bold text-gray-700 dark:text-gray-200">
                        {{ strtoupper(substr($post->username, 0, 1) ?: 'N') }}
                    </div>
                </div>

                <div class="flex-1">
                    <header class="flex items-center gap-2 text-sm">
                        <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $post->username }}</span>
                        <span class="text-gray-400">·</span>
                        <time class="text-gray-400">{{ $post->created_at->diffForHumans() }}</time>

                        <div class="ml-auto">
                            <button
                                type="button"
                                class="delete-btn text-sm text-red-500 hover:text-red-700"
                                data-id="{{ $post->id }}"
                            >Delete</button>
                        </div>
                    </header>

                    <div class="mt-2 text-gray-900 dark:text-gray-100">
                        <p class="whitespace-pre-wrap">{{ $post->post }}</p>
                    </div>

                    <div id="delete-form-{{ $post->id }}" class="mt-3 hidden">
                        <form action="{{ route('sns.destroy', $post) }}" method="POST" class="flex gap-2 items-center">
                            @csrf
                            @method('DELETE')

                            <input
                                name="identifier"
                                type="text"
                                placeholder="Enter identifier for this post"
                                required
                                class="px-3 py-2 border rounded w-full"
                                aria-label="identifier"
                            >

                            <button type="submit" class="px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700">Confirm</button>
                            <button type="button" class="px-3 py-2 border rounded cancel-btn" data-id="{{ $post->id }}">Cancel</button>
                        </form>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $sns->links() }}
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var id = this.dataset.id;
            var form = document.getElementById('delete-form-' + id);
            if (form) form.classList.remove('hidden');
        });
    });

    document.querySelectorAll('.cancel-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var id = this.dataset.id;
            var form = document.getElementById('delete-form-' + id);
            if (form) form.classList.add('hidden');
        });
    });
});
</script>
</x-layout>